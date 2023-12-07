<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function showCategories() {
        $categories = Categories::all();
        return response()->json($categories);
    }
    
}
