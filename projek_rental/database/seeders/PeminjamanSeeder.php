<?php

namespace Database\Seeders;

use App\Models\Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $umkm = [
            [
                'nama_peminjam' => fake('id_ID')->name(),
                'ktp_peminjam' => '312345678910' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT),
                'keperluan_pinjam' => fake('id_ID')->sentence(3),
                'mulai' => date('Y-m-d'),
                'selesai' => date('Y-m-d', strtotime('+3 day')),
                'biaya' => rand(100000, 999999),
                'komentar_peminjam' => fake('id_ID')->sentence(4),
                'status_pinjam' => 'Sudah dibayar',
                'armada_id' => 1,
            ],
        ];

        foreach ($umkm as $um) {
            Peminjaman::updateOrCreate(['nama_peminjam' => $um['nama_peminjam']], $um);
        }
    }
}
