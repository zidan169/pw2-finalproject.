<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use App\Models\Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peminjaman = Peminjaman::pluck('id')->toArray();
        $provinsi = [
            [
                'tanggal' => date('Y-m-d'),
                'jumlah_bayar' => rand(),
                'jumlah_bayar' => rand(100000, 999999),
                'peminjaman_id' => $peminjaman[array_rand($peminjaman)],
            ]
        ];

        foreach ($provinsi as $prov) {
            Pembayaran::updateOrCreate(['peminjaman_id' => $prov['peminjaman_id']], $prov);
        }
    }
}
