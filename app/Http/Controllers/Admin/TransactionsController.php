<?php

namespace App\Http\Controllers\Admin;


use App\Events\BillEvent;
use App\Http\Controllers\Controller;
use App\Repositories\Bills\BillsRepository;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function __construct(BillsRepository $billsRepository)
    {
        $this->repository = $billsRepository;

        $this->middleware('permission:bill-list', ['only' => ['index','export','approved','']]);
        $this->middleware('permission:bill-create', ['only' => ['create','store','sendMail']]);
        $this->middleware('permission:bill-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:bill-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = $this->repository->getTransactions();

        return view('admin.transactions.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if ( Request()->ajax() ) {
            $id = Request()->get('id');
            $transactionDetail = $this->repository->transactionDetail($id);

            return  view('admin.transactions.modal', compact('transactionDetail'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->destroyBill($id);

        return  redirect()->back()->with(['msg'=>$deleted]);
    }

    public function export($id) {
        $object = $this->repository->getBill($id);
        $nameFile = 'Don-Hang-'.$object->user->email.'.pdf';
        $pdf = PDF::loadview('admin.transactions.bill', compact('object'));

        return $pdf->download($nameFile);
    }

    public function approved($id) {
        $approved = $this->repository->approvedBill($id);

        return  redirect()->back()->with(['msg'=>$approved]);
    }

    public function sendMail($id) {
        $project = $this->repository->getBill($id);
        event(new BillEvent($project));
    }
}
