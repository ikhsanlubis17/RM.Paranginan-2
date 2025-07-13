<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Menu;

class FavoriteController extends Controller
{
    public function toggle(Request $request)
    {
        $user = auth()->user();
        $menuId = $request->menu_id;
        $user->favoriteMenus()->toggle($menuId);
        $isNowFavorited = $user->favoriteMenus()->where('menu_id', $menuId)->exists();
        return response()->json([
            'success' => true,
            'favorited' => $isNowFavorited
        ]);
    }

    public function myFavorites()
    {
        $user = auth()->user();
        $menus = $user->favoriteMenus()->with('favoritedBy')->get();
        return view('favorite-mine', compact('menus'));
    }

    public function index()
    {
        $favorites = auth()->user()->favoriteMenus()->latest()->get();
        return view('favorite.index', compact('favorites'));
    }
} 