<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Waste;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::with('wastes')->get();
        $wastes = Waste::with('category')->take(6)->get();
        
        return view('home', compact('categories', 'wastes'));
    }
}