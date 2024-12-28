<?php

namespace App\Http\Controllers;

use App\Interface\Repository\BoardingHouseRepositoryInterface;
use App\Interface\Repository\CityRepositoryInterface;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private CityRepositoryInterface $cityRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
        CityRepositoryInterface $cityRepository
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->cityRepository = $cityRepository;
    }

    public function show($slug)
    {
        $city = $this->cityRepository->getCityBySlug($slug);
        $boardingHouses = $this->boardingHouseRepository->getBoardingHouseByCitySlug($slug);
        return view('pages.city.show', compact('boardingHouses', 'city'));
    }
}
