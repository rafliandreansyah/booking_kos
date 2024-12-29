<?php

namespace App\Http\Controllers;

use App\Interface\Repository\BoardingHouseRepositoryInterface;
use App\Interface\Repository\CategoryRepositoryInterface;
use App\Interface\Repository\CityRepositoryInterface;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{

    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }
    public function find()
    {
        $cities = $this->cityRepository->getAllCity();
        $categories = $this->categoryRepository->getAllCategory();
        return view('pages.boardinghouse.find', compact('cities', 'categories'));
    }

    public function findResult(Request $request)
    {
        $results = $this->boardingHouseRepository->getAllBoardingHouses($request->search, $request->city, $request->category);
        return view('pages.boardinghouse.index', compact('results'));
    }

    public function show($slug)
    {
        $boardingHouse =  $this->boardingHouseRepository->getBoardingHouseByBoardingHouseSlug($slug);
        return view('pages.boardingHouse.detail', compact('boardingHouse'));
    }

    public function rooms($slug)
    {
        $boardingHouse =  $this->boardingHouseRepository->getBoardingHouseByBoardingHouseSlug($slug);
        return view('pages.boardingHouse.rooms', compact('boardingHouse'));
    }
}
