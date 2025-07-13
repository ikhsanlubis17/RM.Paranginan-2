<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Helpers;

class CartController extends Controller
{
    // Tampilkan halaman cart
    public function index()
    {
        $cart = session('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['qty'] * $item['price'];
        }
        return view('cart', compact('cart', 'total'));
    }

    // Tambah item ke cart
    public function add(Request $request, $menuId)
    {
        $menu = Menu::findOrFail($menuId);
        $cart = session('cart', []);
        $qty = (int) $request->input('qty', 1);
        if (isset($cart[$menuId])) {
            $cart[$menuId]['qty'] += $qty;
        } else {
            $cart[$menuId] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'price' => $menu->price,
                'qty' => $qty,
            ];
        }
        session(['cart' => $cart]);
        return back()->with('success', 'Menu berhasil ditambahkan ke keranjang!');
    }

    // Update jumlah item di cart
    public function update(Request $request, $menuId)
    {
        $cart = session('cart', []);
        if (isset($cart[$menuId])) {
            $cart[$menuId]['qty'] = max(1, (int) $request->input('qty', 1));
            session(['cart' => $cart]);
        }
        return back();
    }

    // Hapus item dari cart
    public function remove($menuId)
    {
        $cart = session('cart', []);
        if (isset($cart[$menuId])) {
            unset($cart[$menuId]);
            session(['cart' => $cart]);
        }
        return back();
    }

    // Kosongkan cart saat logout (bisa dipanggil dari event logout)
    public function clear()
    {
        session()->forget('cart');
        return back();
    }

    // Generate link WhatsApp dari cart
    public function whatsappLink()
    {
        $cart = session('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['qty'] * $item['price'];
        }
        $userName = Auth::check() ? Auth::user()->name : null;
        $cartArray = array_values($cart);
        $link = Helpers::generateWhatsAppOrderLink($cartArray, $total, $userName);
        return redirect($link);
    }
} 