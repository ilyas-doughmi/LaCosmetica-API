<?php

namespace App\DAOs;

use App\Models\Category;
use App\DTOs\CategoryDTO;

class CategoryDAO
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    public function createCategory(CategoryDTO $dto)
    {
        return Category::create([
            'name' => $dto->name,
            'description' => $dto->description,
        ]);
    }

    public function updateCategory(Category $category, CategoryDTO $dto)
    {
        $category->update([
            'name' => $dto->name,
            'description' => $dto->description,
        ]);

        return $category;
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();
    }
}