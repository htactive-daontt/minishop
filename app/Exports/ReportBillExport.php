<?php

namespace App\Exports;

use App\Repositories\Bills\BillsRepository;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class ReportBillExport extends AbstractExport
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(BillsRepository $billsRepository)
    {
        $this->billRepo = $billsRepository;
    }

    public function collection()
    {
        $data = $this->billRepo->getBillReport();
        foreach ($data as $key => $value) {
            $return[$key] = [
                $key+1,
                $value->user->name,
                $value->total_pay,
                date( "d/m/Y", strtotime($value->created_at))
            ];
        }

        return collect($return);
    }

    public function handle() {

    }

    public function headings(): array
    {
        return [
            'id',
            'Tên khác hàng',
            'Tổng bill',
            'Thời gian'
        ];
    }
}
