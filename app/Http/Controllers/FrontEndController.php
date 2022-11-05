<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $recentproducts = Product::orderBy('created_at', 'desc')->take(8)->get();
        return view('welcome',[
            'categories'=> $categories,
            'recentProducts' => $recentproducts
        ]);
    }
}
