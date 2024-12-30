<?php

namespace App\Interface\Repository;

interface BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $city = null, $category = null);

    public function getPopularBoardingHouses($limit = 5);

    public function getBoardingHouseByBoardingHouseSlug($slug);

    public function getBoardingHouseByCitySlug($slug);

    public function getBoardingHouseByCategorySlug($slug);

    public function getBoardingHouseRoomById($id);
}
