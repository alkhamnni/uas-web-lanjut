<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nama_kategori' => 'entry-level',
                'keterangan' => 'untuk penggunaan dasar'
            ],
            [
                'nama_kategori' => 'Midrange',
                'keterangan' => 'penggunaan menengah'
            ],
            [
                'nama_kategori' => 'flagship',
                'keterangan' => 'paket lengkap'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
