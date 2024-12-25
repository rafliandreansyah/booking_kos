<?php

namespace App\Http\Controllers;

use App\Interface\Repository\CategoryRepositoryInterface;
use App\Interface\Repository\CityRepositoryInterface;
use App\Repository\BoardingHouseRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepository $boardingHouseRepository;

    function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepository $boardingHouseRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAllCategory();
        $cities = $this->cityRepository->getAllCity();
        $popularBoardingHouses = $this->boardingHouseRepository->getPopularBoardingHouses();
        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses();
        return view('pages.home', compact('categories', 'cities', 'popularBoardingHouses', 'boardingHouses'));
    }
}
