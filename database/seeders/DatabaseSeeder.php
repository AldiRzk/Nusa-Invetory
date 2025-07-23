<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Supplier;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role' => 'admin',
            'password' => bcrypt(12345678)
        ]);
        User::create([
            'name' => 'Staff',
            'email' => 'admin@gmail.com',
            'role' => 'staff',
            'password' => bcrypt(12345678)
        ]);

        Category::create([
            'name' => 'Bumbu Dapur',
            'description' => 'Tidak ada description',
        ]);

        Product::create([
            'category_id' => '1',
            'name' => 'Masako',
            'code' => 'MBD1',
            'unit' => 'Kg',
            'stock' => '1000',
            'price' => '10001',
            'description' => 'Untuk membuat sayur sop',
        ]);

        Supplier::create([
            'name' => 'Sutarjo',
            'phone' => '089778762144',
            'email' => 'sutar@gmail.com',
            'address' => 'Keraton'
        ]);

        Purchase::create([
            'user_id' => '1',
            'supplier_id' => '1',
            'date' => now(),
            'total_amounts' => '0',
            'notes' => 'OK'
        ]);

        Sale::create([
            'user_id' => '1',
            'customer_name' => 'Opik',
            'date' => now(),
            'total_amounts' => '0',
            'notes' => 'OK OK'
        ]);
    }
}
