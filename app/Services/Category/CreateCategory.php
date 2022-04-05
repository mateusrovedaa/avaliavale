<?php

declare(strict_types=1);

namespace App\Services\Category;

use App\Models\Category;

class CreateCategory
{
    public function handle(array $data): Category
    {
        $category = new Category;

        $category->name = $data['name'];
        $category->description = $data['description'] ?? null;

        $category->save();

        return $category;
    }
}
