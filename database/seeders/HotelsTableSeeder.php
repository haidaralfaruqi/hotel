<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel; // Sesuaikan dengan nama model yang benar

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tambahkan data hotel ke dalam tabel
        Hotel::create([
            'name' => 'Hotel 1',
            'description' => 'Satu orang, Queen Bed',
            'price' => 100.00,
            'image' => 'https://asset.kompas.com/crops/SmXa-KlIkF_MVULGBN7IzlIyV1g=/4x0:904x600/750x500/data/photo/2022/12/09/639342fd0b5a8.jpg', // Misalkan ada gambar dengan nama hotel_a.jpg
        ]);

        Hotel::create([
            'name' => 'Hotel 2',
            'description' => 'Dua orang, Twin Bed',
            'price' => 120.00,
            'image' => 'https://asset.kompas.com/crops/SmXa-KlIkF_MVULGBN7IzlIyV1g=/4x0:904x600/750x500/data/photo/2022/12/09/639342fd0b5a8.jpg',
        ]);

        Hotel::create([
            'name' => 'Hotel 3',
            'description' => 'Dua orang, Twin Bed',
            'price' => 159.00,
            'image' => 'https://asset.kompas.com/crops/SmXa-KlIkF_MVULGBN7IzlIyV1g=/4x0:904x600/750x500/data/photo/2022/12/09/639342fd0b5a8.jpg', // Misalkan ada gambar dengan nama hotel_a.jpg
        ]);

        Hotel::create([
            'name' => 'Hotel 4',
            'description' => 'Dua orang, Queen Bed',
            'price' => 200.00,
            'image' => 'https://asset.kompas.com/crops/SmXa-KlIkF_MVULGBN7IzlIyV1g=/4x0:904x600/750x500/data/photo/2022/12/09/639342fd0b5a8.jpg',
        ]);

        // Tambahkan data hotel lainnya jika diperlukan
    }
}
