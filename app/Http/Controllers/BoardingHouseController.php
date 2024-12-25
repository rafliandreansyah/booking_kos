<?php

namespace App\Http\Controllers;

use App\Interface\Repository\CategoryRepositoryInterface;
use App\Interface\Repository\CityRepositoryInterface;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{

    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function find()
    {
        $cities = $this->cityRepository->getAllCity();
        $categories = $this->categoryRepository->getAllCategory();
        return view('pages.findboardinghouse', compact('cities', 'categories'));
    }
}
