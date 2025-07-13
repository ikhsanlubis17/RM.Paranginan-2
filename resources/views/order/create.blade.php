@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ url()->previous() }}" class="inline-block mb-4 text-orange-600 hover:text-orange-800 font-semibold">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>

                    <h1 class="text-2xl font-bold text-gray-900 mb-4">Pesan Menu: {{ $menu->name }}</h1>

                    <form action="{{ route('order.store', $menu->id) }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Nama Pemesan --}}
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Pemesan</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm
                                    {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Nomor WhatsApp --}}
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                                placeholder="08xxxxxxxxxx"
                                class="mt-1 block w-full rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm
                                    {{ $errors->has('phone') ? 'border-red-500' : 'border-gray-300' }}">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tombol Submit --}}
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors">
                                <i class="fas fa-paper-plane mr-2"></i>Kirim Pesanan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
