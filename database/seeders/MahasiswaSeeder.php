<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nim' => '12345',
            'nama_lengkap' => 'John Doe',
            'jurusan' => 'Teknik Informatika',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2000-01-01',
            'no_hp' => '081234567890',
            'email' => 'john@example.com',
            'alamat_tinggal' => 'Jl. Example No. 123'
        ]);
    }
}
