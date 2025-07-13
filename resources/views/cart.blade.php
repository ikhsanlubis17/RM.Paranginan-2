@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-4">
    <h1 class="text-2xl font-bold mb-6 text-orange-700 flex items-center"><i class="fas fa-shopping-cart mr-2"></i>Keranjang Belanja</h1>
    @if(count($cart) > 0)
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <table class="w-full text-left mb-4">
            <thead>
                <tr class="border-b">
                    <th class="py-2">Menu</th>
                    <th class="py-2 text-center">Jumlah</th>
                    <th class="py-2 text-right">Harga</th>
                    <th class="py-2 text-right">Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                <tr class="border-b">
                    <td class="py-2 font-semibold">{{ $item['name'] }}</td>
                    <td class="py-2 text-center">
                        <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="inline-flex items-center">
                            @csrf
                            <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" class="w-16 border rounded px-2 py-1 text-center mr-2" onchange="this.form.submit()">
                        </form>
                    </td>
                    <td class="py-2 text-right">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                    <td class="py-2 text-right">Rp {{ number_format($item['qty'] * $item['price'], 0, ',', '.') }}</td>
                    <td class="py-2 text-right">
                        <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-between items-center mt-4">
            <div class="font-bold text-lg">Total:</div>
            <div class="font-bold text-lg text-orange-700">Rp {{ number_format($total, 0, ',', '.') }}</div>
        </div>
        <div class="mt-6 text-right">
            <a href="{{ route('cart.whatsapp') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-semibold inline-flex items-center">
                <i class="fab fa-whatsapp mr-2"></i>Pesan via WhatsApp
            </a>
        </div>
    </div>
    @else
    <div class="bg-white rounded-lg shadow p-8 text-center">
        <i class="fas fa-shopping-cart text-5xl text-gray-300 mb-4"></i>
        <h2 class="text-xl font-semibold mb-2">Keranjang kosong</h2>
        <p class="text-gray-600 mb-4">Yuk, tambahkan menu favoritmu ke keranjang!</p>
        <a href="{{ route('menu') }}" class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-lg font-semibold inline-flex items-center">
            <i class="fas fa-list mr-2"></i>Lihat Menu
        </a>
    </div>
    @endif
</div>
@endsection 