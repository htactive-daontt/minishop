<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Bills\BillsRepository;
use App\Repositories\BillsDetail\BillsDetailRepository;

class ReportController extends Controller
{
    public function __construct(
        BillsRepository $billsRepository,
        BillsDetailRepository $billsDetailRepository
    )
    {
        $this->billRepo = $billsRepository;
        $this->bilDetailRepo = $billsDetailRepository;

        $this->middleware('permission:report-list', ['only' => ['bills','exportBill','employee','employeeDetail']]);
    }

    public function bills($year) {
        $bill = $this->billRepo->getBillReport();
        $chart = $this->billRepo->reportChart($year);
        $productTop = $this->bilDetailRepo->reportTopProduct();

        return view('admin.report.bill', compact('bill','chart','productTop'));
    }

    public function exportBill() {

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
