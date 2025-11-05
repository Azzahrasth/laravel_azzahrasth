<?php

namespace Database\Seeders;
use App\Models\RumahSakit;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RumahSakit::create([
            'nama' => 'RS Harapan Sehat',
            'alamat' => 'Jl. Mawar No. 10, Sukabumi',
            'email' => 'harapan@rs.com',
            'telepon' => '0266-123456',
        ]);
        RumahSakit::create([
            'nama' => 'RS Mitra Kasih',
            'alamat' => 'Jl. Melati No. 12, Sukabumi',
            'email' => 'mitra@rs.com',
            'telepon' => '0266-654321',
        ]);
    }
}
