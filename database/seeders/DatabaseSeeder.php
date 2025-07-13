<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Menu;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@paranginan.test',
            'password' => Hash::make('password'),
            'is_admin' => true
        ]);

        // Create sample menus with order_count
        Menu::create([
            'name' => 'Nasi Goreng Spesial',
            'description' => 'Nasi goreng dengan telur, ayam, dan sayuran segar',
            'price' => 25000,
            'image' => null,
            'order_count' => 15
        ]);
        Menu::create([
            'name' => 'Sate Ayam',
            'description' => 'Sate ayam dengan bumbu kacang yang lezat',
            'price' => 30000,
            'image' => null,
            'order_count' => 25
        ]);
        Menu::create([
            'name' => 'Soto Betawi',
            'description' => 'Soto betawi dengan kuah santan yang gurih',
            'price' => 35000,
            'image' => null,
            'order_count' => 10
        ]);
        Menu::create([
            'name' => 'Es Teh Manis',
            'description' => 'Minuman segar untuk menemani hidangan Anda',
            'price' => 8000,
            'image' => null,
            'order_count' => 40
        ]);
    }
}