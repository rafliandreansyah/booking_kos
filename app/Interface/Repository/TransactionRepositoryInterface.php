<?php

namespace App\Interface\Repository;

interface TransactionRepositoryInterface
{
    public function getTransactionDataFromSession();
    public function saveTransactionDataToSession($data);
    public function saveTransaction($data);
    public function getBookingByCode($code);
}
