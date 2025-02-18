<?php

namespace App\Repository;

use App\Interface\Repository\CityRepositoryInterface;
use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    public function getAllCity()
    {
        return City::all();
    }

    public function getCityBySlug($slug)
    {
        return City::where('slug', $slug)->first();
    }
}
