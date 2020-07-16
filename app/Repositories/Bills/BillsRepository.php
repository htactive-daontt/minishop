<?php

namespace App\Repositories\Bills;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BillsRepository.
 *
 * @package namespace App\Repositories\Bills;
 */
interface BillsRepository extends RepositoryInterface
{
    public function getTransactions();
    public function transactionDetail($id);
    public function checkout($payment, $status);
    public function getBill($id);
    public function destroyBill($id);
    public function approvedBill($id);
    public function getBillUser($id, $status);
    public function getDateFilterReport();
    public function getBillReport();
    public function reportChart($year);
    public function reportEmployee();
    public function reportEmployeeDetail($id);
}
