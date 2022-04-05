<?php

declare(strict_types=1);

namespace App\Services\Category;

use App\Models\Category;

class UpdateCategory
{
    public function handle(Category $category, array $data): Category
    {
        $category->name = $data['name'];
        $category->description = $data['description'];

        $category->save();

        return $category;
    }
}
