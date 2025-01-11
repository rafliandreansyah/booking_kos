<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingShowRequest;
use App\Interface\Repository\TransactionRepositoryInterface;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository) {
        $this->transactionRepository = $transactionRepository;
    }

    public function index()
    {
        return view('pages.orders.orders');
    }

    public function show(BookingShowRequest $request) {
        $data = $request->validated();
        $dataTransaction = $this->transactionRepository->getTransactionByCodeEmailPhone($data['code'], $data['email'], $data['phone_number']);
        if (!$dataTransaction) {
            return redirect()->back()->with('error', 'Data transaksi tidak ditemukan.');
        }
        return view('pages.orders.detail-order', compact('dataTransaction'));
    }
}
