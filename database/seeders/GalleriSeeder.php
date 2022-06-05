<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GalleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::create([
            'wisata_id' => 1,
            'tipe' => 'wisata',
            'image' => '1-museum-sang-nila-utama-1.jpg'
        ]);

        Gallery::create([
            'wisata_id' => 1,
            'tipe' => 'wisata',
            'image' => 'museum-sang-nila-utama-2.jpg'
        ]);

        Gallery::create([
            'wisata_id' => 2,
            'tipe' => 'wisata',
            'image' => '1-kampoeng-rabbit-1.jpg'
        ]);

        Gallery::create([
            'wisata_id' => 2,
            'tipe' => 'wisata',
            'image' => 'kampoeng-rabbit-2.jpg'
        ]);

        Gallery::create([
            'wisata_id' => 3,
            'tipe' => 'wisata',
            'image' => '1-taman-bunga-okura-1.jpg'
        ]);

        Gallery::create([
            'wisata_id' => 3,
            'tipe' => 'wisata',
            'image' => 'taman-bunga-okura-2.jpg'
        ]);


    }
}
