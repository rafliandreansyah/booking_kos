<?php

namespace App\Interface\Repository;

interface CityRepositoryInterface
{
    public function getAllCity();

    public function getCityBySlug($slug);
}
