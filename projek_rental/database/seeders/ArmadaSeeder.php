<?php

namespace Database\Seeders;

use App\Models\Armada;
use App\Models\JenisKendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArmadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['Toyota', 'Honda', 'Suzuki', 'Mitsubishi', 'Daihatsu', 'Isuzu', 'Nissan', 'Mazda', 'Mercedes-Benz', 'BMW', 'Audi', 'Volkswagen', 'Ford', 'Chevrolet', 'Jeep', 'Hyundai', 'Kia', 'Volvo', 'Peugeot', 'Renault', 'Jaguar', 'Land Rover', 'Porsche', 'Lexus', 'Subaru', 'Mini', 'Bentley', 'Tesla', 'Ferrari', 'Lamborghini', 'Maserati', 'McLaren', 'Bugatti', 'Rolls-Royce', 'Aston Martin', 'Lotus', 'Cadillac',  'Wuling', 'Datsun', 'Chery'];
        $plat = ['B', 'D', 'F', 'A', 'DB', 'I', 'E', 'Z'];
        $tahun = ['2018', '2019', '2020', '2021', '2022', '2023', '2024'];
        $jenis = JenisKendaraan::get()->pluck('id')->toArray();
        $armada = [];

        // create 10 random armada, if exists replace
        for ($i = 0; $i < 10; $i++) {
            $armada[] = [
                'merk' => $brands[rand(0, count($brands) - 1)],
                'nopol' => $plat[rand(0, count($plat) - 1)] . ' ' . rand(1000, 9999) . ' ' . strtoupper(randomLetters(3)),
                'thn_beli' => $tahun[rand(0, count($tahun) - 1)],
                'deskripsi' => fake('id_ID')->sentence(10),
                'kapasitas_kursi' => rand(2, 6),
                'rating' => rand(1, 5),
                'jenis_kendaraan_id' => $jenis[rand(0, count($jenis) - 1)],
            ];
        }

        $existing = Armada::get()->toArray();
        foreach ($armada as $arm) {
            $exists = false;
            foreach ($existing as $exist) {
                if ($exist['nopol'] == $arm['nopol']) {
                    $exists = true;
                    break;
                }
            }
            if (!$exists) {
                Armada::updateOrCreate(['nopol' => $arm['nopol']], $arm);
            }
        }
    }
}
