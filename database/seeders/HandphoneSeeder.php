<?php

namespace Database\Seeders;

use App\Models\Handphone;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HandphoneSeeder extends Seeder
{
    public function run(): void
    {
        $handphones =  [
            [
                'id' => 'tt1746090',
                'nama' => 'oppo',
                'deskripsi' => 'adalah perusahaan smartphone asal korea yang berkembang pesat.',
                'tahun' => 2023,
                'category_id' => 1,
                'perusahaan' => 'oppo indonesia',
                'foto_sampul' => 'oppo.jpg',
            ],
            [
                'id' => 'tt1746091',
                'nama' => 'samsung',
                'deskripsi' => 'adalah perusahaan teknologi asal Korea Selatan yang terkenal dengan produk-produk elektroniknya.',
                'tahun' => 2022,
                'category_id' => 1,
                'perusahaan' => 'samsung electronics',
                'foto_sampul' => 'samsung.jpeg',
            ],
            [
                'id' => 'tt1746092',
                'nama' => 'apple',
                'deskripsi' => 'adalah perusahaan teknologi asal Amerika Serikat yang dikenal dengan produk-produk seperti iPhone, iPad, dan MacBook.',
                'tahun' => 2022,
                'category_id' => 1,
                'perusahaan' => 'apple inc.',
                'foto_sampul' => 'apple.jpeg',
            ]
            ,
            [
                'id' => 'tt1746093',
                'nama' => 'xiaomi',
                'deskripsi' => 'adalah perusahaan teknologi asal China yang fokus pada perangkat keras, perangkat lunak, dan layanan internet.',
                'tahun' => 2022,
                'category_id' => 1,
                'perusahaan' => 'xiaomi corporation',
                'foto_sampul' => 'xiaomi.jpeg',
            ]
            ,
            [
                'id' => 'tt1746095',
                'nama' => 'lenovo',
                'deskripsi' => 'adalah perusahaan teknologi asal China yang memproduksi berbagai perangkat keras seperti laptop, smartphone, dan tablet.',
                'tahun' => 2022,
                'category_id' => 1,
                'perusahaan' => 'lenovo group limited',
                'foto_sampul' => 'lenovo.jpeg',
            ]
            ,
            [
                'id' => 'tt1746094',
                'nama' => 'google',
                'deskripsi' => 'adalah perusahaan teknologi asal Amerika Serikat yang terkenal dengan mesin pencarinya dan berbagai layanan online.',
                'tahun' => 2022,
                'category_id' => 1,
                'perusahaan' => 'alphabet inc.',
                'foto_sampul' => 'google.jpeg',
            ]
            ,
            [
                'id' => 'tt1746096',
                'nama' => 'sony',
                'deskripsi' => 'adalah perusahaan teknologi asal Jepang yang terkenal dengan produk-produk seperti PlayStation, kamera, dan televisi.',
                'tahun' => 2022,
                'category_id' => 1,
                'perusahaan' => 'sony corporation',
                'foto_sampul' => 'sony.jpeg',
            ]
            
        ];
        foreach ($handphones as $handphone) {
            Handphone::create([
                'id' => $handphone['id'],
                'nama' => $handphone['nama'],
                'deskripsi' => $handphone['deskripsi'],
                'tahun' => $handphone['tahun'],
                'category_id' => $handphone['category_id'],
                'perusahaan' => $handphone['perusahaan'],
                'foto_sampul' => $handphone['foto_sampul'],
            ]);
        }

    }
}
