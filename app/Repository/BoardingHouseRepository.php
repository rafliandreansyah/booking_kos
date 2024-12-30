<?php

namespace App\Repository;

use App\Interface\Repository\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $city = null, $category = null)
    {
        $query = BoardingHouse::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($city) {
            $query->whereHas('city', function (Builder $query) use ($city) {
                return $query->where('slug', $city);
            });
        }

        if ($category) {
            $query->whereHas('category', function (Builder $query) use ($category) {
                return $query->where('slug', $category);
            });
        }

        return $query->get();
    }

    public function getPopularBoardingHouses($limit = 5)
    {
        return BoardingHouse::withCount('transactions')->orderBy('transactions_count', 'desc')->take($limit)->get();
    }

    public function getBoardingHouseByBoardingHouseSlug($slug)
    {
        return BoardingHouse::where('slug', $slug)->first();
    }

    public function getBoardingHouseByCitySlug($slug)
    {
        return BoardingHouse::whereHas('city', function (Builder $query) use ($slug) {
            return $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseByCategorySlug($slug)
    {
        return BoardingHouse::whereHas('category', function (Builder $query) use ($slug) {
            return $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseRoomById($id)
    {
        return Room::where('id', $id)->first();
    }
}
