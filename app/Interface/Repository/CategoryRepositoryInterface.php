<?php

namespace App\Interface\Repository;

interface CategoryRepositoryInterface
{
    public function getAllCategory();

    public function getCategoryBySlug($slug);
}
