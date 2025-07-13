<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">
                {{ __('Daftar Order') }}
            </h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($orders->count() > 0)
                        <div class="space-y-6">
                            @foreach($orders as $order)
                                <div class="border border-gray-200 rounded-lg overflow-hidden">
                                    <!-- Order Header -->
                                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <h3 class="text-lg font-semibold text-gray-900">Pesanan #{{ $order->id }}</h3>
                                                <p class="text-sm text-gray-600">
                                                    <span class="font-medium">Pelanggan:</span>
                                                    @if($order->user)
                                                        {{ $order->user->name }} ({{ $order->user->email }})
                                                    @else
                                                        -
                                                    @endif
                                                </p>
                                            </div>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                                {{ $order->status }}
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Order Body -->
                                    <div class="px-6 py-4">
                                        <p class="text-sm text-gray-700 mb-2"><span class="font-medium">Menu:</span> {{ $order->menu->name }}</p>
                                        <p class="text-sm text-gray-700 mb-2"><span class="font-medium">Jumlah:</span> {{ $order->quantity }}</p>
                                        <p class="text-sm text-gray-700"><span class="font-medium">Total:</span> Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <i class="fas fa-receipt text-6xl text-gray-400 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Order</h3>
                            <p class="text-gray-600 mb-4">Belum ada pesanan yang masuk.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 