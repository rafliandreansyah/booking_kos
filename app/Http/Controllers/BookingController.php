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
        return redirect()->route('home');
    }
}
