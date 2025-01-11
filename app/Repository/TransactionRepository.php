<?php

namespace App\Repository;

use App\Interface\Repository\TransactionRepositoryInterface;
use App\Models\Room;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{

    public function getTransactionDataFromSession()
    {
        return session()->get('transaction');
    }
    public function saveTransactionDataToSession($data)
    {
        $transaction = session()->get('transaction', []);

        foreach ($data as $key => $value) {
            $transaction[$key] = $value;
        }

        session()->put('transaction', $transaction);
    }
    public function saveTransaction($data)
    {
        $room = Room::find(intval($data['room']));
        $data = $this->prepareTransactionData($data, $room);
        return Transaction::create($data);
    }

    private function prepareTransactionData($data, $room)
    {
        $data['code'] = $this->generateTransactionCode();
        $data['payment_status'] = 'pending';
        $data['transaction_date'] = now();

        $total = $this->calculateTotalAmount($room->price_per_month, $data['duration']);
        $data['total_amount'] = $this->calculatePaymentAmount($total, $data['payment_method']);
        $data['room_id'] = $room->id;

        return $data;
    }


    private function generateTransactionCode()
    {
        return rand(100000, 999999);
    }

    public function calculatePaymentAmount($total, $paymentMethod)
    {
        return $paymentMethod == 'full_payment' ? $total : $total * 0.3;
    }

    public function calculateTotalAmount($pricePerMonth, $duration)
    {
        $subTotal = $pricePerMonth * $duration;
        $tax = $subTotal * 0.11;
        $insurance = $subTotal * 0.01;
        return $subTotal + $tax + $insurance;
    }

    public function getBookingByCode($code)
    {
        return Transaction::where('code', $code)->first();
    }

    public function getTransactionByCodeEmailPhone($code, $email, $phone) {
        return Transaction::where('code', $code)->where('email', $email)->where('phone_number', $phone)->first();
    }
}
