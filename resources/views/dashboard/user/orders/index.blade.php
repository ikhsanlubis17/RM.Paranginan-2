@extends('layouts.master')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Riwayat Pesanan Saya</h2>
                </div>

                @if($orders->count() > 0)
                    <div class="space-y-6">
                        @foreach($orders as $order)
                            <div class="border border-gray-200 rounded-lg overflow-hidden">
                                <!-- Order Header -->
                                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900">Pesanan #{{ $order->id }}</h3>
                                            <p class="text-sm text-gray-600">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                                        </div>
                                        <div class="text-right">
                                            @php
                                                $statusColors = [
                                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                                    'proses' => 'bg-blue-100 text-blue-800',
                                                    'selesai' => 'bg-green-100 text-green-800',
                                                    'batal' => 'bg-red-100 text-red-800',
                                                    'diterima' => 'bg-green-100 text-green-800',
                                                    'ditolak' => 'bg-red-100 text-red-800',
                                                ];
                                                $statusLabels = [
                                                    'pending' => 'Menunggu',
                                                    'proses' => 'Diproses',
                                                    'selesai' => 'Selesai',
                                                    'batal' => 'Dibatalkan',
                                                    'diterima' => 'Diterima',
                                                    'ditolak' => 'Ditolak',
                                                ];
                                            @endphp
                                            <span class="px-3 py-1 inline-flex text-sm font-semibold rounded-full {{ $statusColors[$order->status] }}">
                                                {{ $statusLabels[$order->status] }}
                                            </span>
                                            <p class="text-lg font-bold text-gray-900 mt-1">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Order Items -->
                                <div class="px-6 py-4">
                                    <div class="space-y-3">
                                        @foreach($order->orderItems as $item)
                                            <div class="flex items-center space-x-4">
                                                <!-- Menu Image -->
                                                <div class="flex-shrink-0">
                                                    @if($item->menu->image)
                                                        <img src="{{ asset('storage/' . $item->menu->image) }}" 
                                                             alt="{{ $item->menu->name }}" 
                                                             class="w-16 h-16 object-cover rounded-lg">
                                                    @else
                                                        <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>

                                                <!-- Menu Details -->
                                                <div class="flex-1 min-w-0">
                                                    <h4 class="text-sm font-medium text-gray-900">{{ $item->menu->name }}</h4>
                                                    <p class="text-sm text-gray-500">{{ $item->quantity }}x @ Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                                    @if($item->note)
                                                        <p class="text-xs text-gray-500 mt-1">Catatan: {{ $item->note }}</p>
                                                    @endif
                                                </div>

                                                <!-- Subtotal -->
                                                <div class="text-right">
                                                    <p class="text-sm font-semibold text-gray-900">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Order Notes -->
                                    @if($order->order_note || $order->table_number)
                                        <div class="mt-4 pt-4 border-t border-gray-200">
                                            @if($order->table_number)
                                                <p class="text-sm text-gray-600">
                                                    <span class="font-medium">Meja:</span> {{ $order->table_number }}
                                                </p>
                                            @endif
                                            @if($order->order_note)
                                                <p class="text-sm text-gray-600 mt-1">
                                                    <span class="font-medium">Catatan:</span> {{ $order->order_note }}
                                                </p>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $orders->links() }}
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="text-gray-400 mb-4">
                            <svg class="mx-auto h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada pesanan</h3>
                        <p class="text-gray-500 mb-6">Anda belum memiliki riwayat pesanan.</p>
                        <a href="{{ route('menu') }}" class="inline-flex items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-700 focus:bg-orange-700 active:bg-orange-900 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Lihat Menu
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 