<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerInformationStoreRequest;
use App\Interface\Repository\BoardingHouseRepositoryInterface;
use App\Interface\Repository\TransactionRepositoryInterface;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
        TransactionRepositoryInterface $transactionRepository
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function booking(Request $request, $slug)
    {
        $this->transactionRepository->saveTransactionDataToSession($request->all());
        return redirect()->route('booking.information', $slug);
    }

    public function information($slug)
    {
        $transaction = $this->transactionRepository->getTransactionDataFromSession();
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseByBoardingHouseSlug($slug);
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById($transaction['room']);
        return view('pages.booking.information', compact('boardingHouse', 'room'));
    }

    public function saveInformation(CustomerInformationStoreRequest $request, $slug)
    {

        $data = $request->validated();
        $this->transactionRepository->saveTransactionDataToSession($data);

        return redirect()->route('checkout', $slug);
    }

    public function checkout($slug)
    {
        $dataBooking = $this->transactionRepository->getTransactionDataFromSession();
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseByBoardingHouseSlug($slug);
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById($dataBooking['room']);
        return view('pages.booking.checkout', compact('dataBooking', 'boardingHouse', 'room'));
    }

    public function payment(Request $request)
    {
        $this->transactionRepository->saveTransactionDataToSession($request->all());
        $transaction = $this->transactionRepository->getTransactionDataFromSession();
        $trx = $this->transactionRepository->saveTransaction($transaction);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is3Ds');

        $params = array(
            'transaction_details' => [
                'order_id' => $trx->code,
                'gross_amount' => $trx->total_amount,
            ],
            'customer_details' => [
                'first_name' => $trx->name,
                'email' => $trx->email,
                'phone' => $trx->phone_number,
            ]
        );
        $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
        return redirect($paymentUrl);
    }

    public function success(Request $request)
    {
        $orderData = $this->transactionRepository->getBookingByCode($request->order_id);
        if (!$orderData) {
            return redirect('/');
        }
        return view('pages.booking.success', compact('orderData'));
    }
}
