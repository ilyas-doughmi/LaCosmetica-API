<?php

namespace App\Http\Controllers;

use App\DAOs\CategoryDAO;
use App\DTOs\CategoryDTO;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    public function __construct(private CategoryDAO $categoryDAO) {}

    public function index(){
        $categories = $this->categoryDAO->getAllCategories();
        return response()->json($categories,200);
    }

    public function show($id)
    {
        try{
            $category = $this->categoryDAO->getCategoryById($id);
            return response()->json($category,200);
        }catch(ModelNotFoundException $e) {
            return response()->json(['message'=>'categorie not found'],404);
        }
    }
}
