<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Waste;
use App\Models\Point;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default admin user
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create default nasabah user
        $nasabah = User::create([
            'name' => 'Nasabah Test',
            'email' => 'nasabah@example.com',
            'password' => Hash::make('password'),
            'role' => 'nasabah',
        ]);

        // Create points record for nasabah
        Point::create([
            'user_id' => $nasabah->id,
            'total_points' => 0,
        ]);

        // Create sample categories
        $categories = [
            'Plastik',
            'Kertas',
            'Logam',
            'Kaca',
            'Elektronik',
        ];

        foreach ($categories as $categoryName) {
            Category::create(['name' => $categoryName]);
        }

        // Create sample wastes
        $wastes = [
            ['name' => 'Botol Plastik', 'category_id' => 1, 'price_per_kg' => 3000],
            ['name' => 'Kantong Plastik', 'category_id' => 1, 'price_per_kg' => 2000],
            ['name' => 'Kertas Koran', 'category_id' => 2, 'price_per_kg' => 1500],
            ['name' => 'Kertas HVS', 'category_id' => 2, 'price_per_kg' => 2500],
            ['name' => 'Kaleng Aluminium', 'category_id' => 3, 'price_per_kg' => 15000],
            ['name' => 'Besi Tua', 'category_id' => 3, 'price_per_kg' => 5000],
            ['name' => 'Botol Kaca', 'category_id' => 4, 'price_per_kg' => 1000],
            ['name' => 'HP Bekas', 'category_id' => 5, 'price_per_kg' => 50000],
        ];

        foreach ($wastes as $waste) {
            Waste::create($waste);
        }
    }
}
