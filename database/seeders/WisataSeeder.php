<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wisata::create([
            'judul' => 'Museum Sang Nila Utama',
            'slug' => '390-museum-sang-nila-utama',
            'thumbnail' => 'museum-sang-nila-utama-1.jpg',
            'jenis' => 'Rekreasi',
            'deskripsi' => '<p>Museum Sang Nila Utama merupakan sebuah museum daerah yang berlokasi di Pekanbaru, Riau. Museum ini mengumpulkan dan menyimpan warisan-warisan yang berhubungan dengan budaya Melayu Riau seperti pakaian adat pernikahan, permainan tradisional, alat musik, artefak dan lainnya. Lokasinya berada di Jalan Jenderal Sudirman, Pekanbaru dan berada dalam satu kompleks kantor Dinas Kebudayaan Provinsi Riau.</p>',
            'alamat' => 'Jl. Sudirman No 194, Kec. Marpoyan Damain, Kel. Tangkerang Tengah',
            'hp' => '+6276140195',
            'maps' => 'https://g.page/Museum-Sang-Nila-Utama?share',
        ]);

        Wisata::create([
            'judul' => 'Kampoeng Rabbit',
            'slug' => '951-kampoeng-rabbit',
            'thumbnail' => 'kampoeng-rabbit-1.jpg',
            'jenis' => 'Rekreasi',
            'deskripsi' => '<p>Di sini menawarkan hal-hal menarik dan unik dari wisata lainnya, ada banyak kelinci yang Encik dan Puan bisa temui. Seperti yang dikatakan owner Kampoeng Rabbits, Putriyana, ada tujuh jenis kelinci di wisata ini.</p><p>Tujuh jenis kelinci tersebut, dikatakan Putriyana, antara lain kelinci anggora, kelinci lop, kelinci Flemish Giant, kelinci Rex, kelinci Dutch, kelinci Lion, dan kelinci Nederland Dwarf.</p><p>Dari 7 jenis kelinci tersebut, sebanyak 30 ekor kelinci yang dipelihara di area ini. Semua kelinci tersebut berada di kandang dalam lahan yang digabungkan dengan wisatanya. Jadi bagi pecinta kelinci, tentunya puas sekali berkunjung ke sini.</p>',
            'alamat' => 'Jl. Kenangan, Kec. Tenayan Raya, Kel. Jadirejo',
            'maps' => 'https://goo.gl/maps/HygD6pkXsVB2RTLo7',
        ]);

        Wisata::create([
            'judul' => 'Taman Bunga Impian Okura',
            'slug' => '859-taman-bunga-impian-okura',
            'thumbnail' => 'taman-bunga-okura-1.jpg',
            'jenis' => 'Rekreasi',
            'deskripsi' => '<p>Wisata taman bunga atau kembang yang ada di kota Pekanbaru, salah satunya yaitu Taman Bunga Impian Okura Pekanbaru di kalangan kawula muda ini sedang ramai dibicarakan dan hits di Instagram. Ada banyak sekali bunga yang bisa dijumpai di taman tersebut seperti bunga kancing baju, matahari, Vinca, Miana, Cladium maupun bunga Jengger Ayam.</p>',
            'alamat' => 'Jl. Raja Panjang, Kec. Rumbai, Kel. Rummbai Bukit',
            'hp' => '+6285265213650',
            'maps' => 'https://goo.gl/maps/srur9wALZjWmGD1Y6',
        ]);
    }
}
