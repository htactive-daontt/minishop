<?php

namespace App\Repositories\Bills;

use App\Entities\BillsDetail\BillsDetail;
use App\Entities\GiftCodes\GiftCodes;
use App\Entities\Products\Products;
use App\Entities\Users\Users;
use App\Events\BillEvent;
use Illuminate\Support\Facades\Session;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Bills\BillsRepository;
use App\Entities\Bills\Bills;
use App\Validators\Bills\BillsValidator;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

/**
 * Class BillsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Bills;
 */
class BillsRepositoryEloquent extends BaseRepository implements BillsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bills::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getTransactions() {
        return Bills::with('user')
                            ->orderBy('id','DESC')
                            ->with('payment')
                            ->get();
    }

    public function transactionDetail($id) {
        return BillsDetail::where('bill_id', $id)
                                ->with('product')
                                ->get();
    }

    public function checkout($payment, $status) {

        return $this->createBill($payment, $status);
    }

    public function createBill($id, $status) {
        DB::beginTransaction();

        if (Session::has('gift')) {
            $gift = GiftCodes::find(Session::get('gift'));
            $gift->qty = $gift->qty - 1 ;
            $gift->update();

            Session::remove('gift');
        }


        $bill = [
            'total' => str_replace(',','',Cart::subtotal(0,3)),
            'tax'   => str_replace(',','',Cart::tax(0,3)),
            'discount'  => str_replace(',','',Cart::discount(0,3)),
            'payment_id'    => $id,
            'user_id'   => Auth::id(),
            'status'    => $status,
            'total_pay' => str_replace(',','',Cart::total(0,3))
        ];
        $createBill = $this->create($bill);

        $this->createBillDetail($createBill->id);

        DB::commit();

        Cart::destroy();

        return 'Đơn hàng được xác nhận thành công';
    }

    public function createBillDetail($bill_id) {
        foreach (Cart::content() as $key => $value) {
            $billDetail = [
                'bill_id' => $bill_id,
                'product_id'    => $value->id,
                'qty'   => $value->qty,
                'total' => str_replace(',','',$value->subtotal)
            ];
            //dd($billDetail);
            BillsDetail::create($billDetail);
        }
    }

    public function getBill($id) {
        return Bills::where('id', $id)
                        ->with('user')
                        ->with('bills_detail')
                        ->first();
    }

    public function destroyBill($id) {
        DB::beginTransaction();
            BillsDetail::where('bill_id',$id)->delete();
            Bills::find($id)->delete();
        DB::commit();

        return 'Xóa thành công';
    }

    public function approvedBill($id) {
        $response = 'Xử lý thành công';
        $status = true;

        DB::beginTransaction();
            $bill = Bills::find($id);
            $bill->status = true;
            $bill->update();

            $billDetail = BillsDetail::where('bill_id', $id)->get();

            foreach ($billDetail as $key => $value) {
                $product = Products::find($value->product_id);

                if ( $product->qty > $value->qty ) {
                    $product->qty = $product->qty - $value->qty;
                    $product->update();
                }else {
                    DB::rollback();
                    $status = false;
                    $response = 'Số lượng không đủ vui lòng nhập thêm';
                }
            }

        DB::commit();
        if ($status) {
            $project = $this->find($id);
            event(new BillEvent($project));
        }
        return $response;
    }

    public function getBillUser($id, $status) {
        return $this->model->where('user_id', $id)->where('status', $status)->with('bills_detail')->get();
    }

    public function getDateFilterReport(){
        return $this->model->select(DB::raw('count(id) as `data`'),DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
            ->groupby('year','month')
            ->get();
    }

    public function getBillReport() {
        return $this->model->where('status', 1)->get();
    }

    public function reportChart($year)
    {
        return $this->model
            ->where('status',1)
            ->whereYear('created_at',$year)
            ->select(DB::raw('month(created_at) as name'),DB::raw('cast(sum(total_pay) as int) as y'),DB::raw('count(*) as qty'))
            ->groupBy('name')
            ->orderBy('name', 'ASC')
            ->get();
    }

    public function reportEmployee() {
        return Users::with('report_bill')
            ->get();
    }

    public function reportEmployeeDetail($id) {
        return $this->model->where('approver_id',$id)->with('user')->get();
    }
}
