<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index()
    {
        $favoriteMenus = \App\Models\Menu::withCount('favoritedBy')
            ->orderByDesc('favorited_by_count')
            ->take(4)
            ->get();
        return view('home', compact('favoriteMenus'));
    }
}
