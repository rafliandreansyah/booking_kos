<?php

namespace App\Repository;

use App\Interface\Repository\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategory()
    {
        return Category::all();
    }
}
