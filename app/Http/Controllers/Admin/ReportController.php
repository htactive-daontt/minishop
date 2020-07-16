<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReportBillExport;
use App\Http\Controllers\Controller;
use App\Repositories\Bills\BillsRepository;
use App\Repositories\BillsDetail\BillsDetailRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function __construct(
        BillsRepository $billsRepository,
        BillsDetailRepository $billsDetailRepository,
        ReportBillExport $reportBillExport
    )
    {
        $this->billRepo = $billsRepository;
        $this->bilDetailRepo = $billsDetailRepository;
        $this->reportExport = $reportBillExport;
    }

    public function bills($year) {
        $bill = $this->billRepo->getBillReport();
        $chart = $this->billRepo->reportChart($year);
        $productTop = $this->bilDetailRepo->reportTopProduct();

        return view('admin.report.bill', compact('bill','chart','productTop'));
    }

    public function exportBill() {
        $this->reportExport->handle();
    }

    public function employee() {
        $report = $this->billRepo->reportEmployee();

        return view('admin.report.employee', compact('report'));
    }

    public function employeeDetail() {
        $id = Request()->get('id');
        $data = $this->billRepo->reportEmployeeDetail($id);

        return view('admin.report.modal_detail', compact('data'));
    }
}
