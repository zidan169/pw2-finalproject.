<?php

namespace Database\Seeders;

use App\Models\JenisKendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis_kendaraan = [
            ['nama' => 'SUV' , 
            'description' => 'SUV stands for Sport Utility Vehicle.  It is a type of car that combines elements of road-going passenger cars with features from off-road vehicles.'
        ],
            ['nama' => 'Sedan' ,
            'description' => 'types of passenger cars with 3 configurations with Pillars A, B, and C'
        ],
            ['nama' => 'MPV' ,
            'description' => 'MPV stands for Multi-Purpose Vehicle. Its a type of car that combines features of a sedan and a station wagon, offering a spacious interior and increased cargo capacity compared to a traditional sedan.'

        ],
            ['nama' => 'Hatchback' ,
            'description' => 'hatchback : the shape of a sedan-based 2-Box passenger car, with a shorter rear and a trunk door that fuses with the rear glass.'

        ],
            ['nama' => 'Coupe' ,
            'description' => 'A small car with two car doors and two or four passenger seats with a roof that usually tends to the rear.'

        ],
            ['nama' => 'Convertible' ,
            'description' => 'A convertible car, also sometimes called a cabriolet, is a passenger car with a retractable roof.'

        ],
            ['nama' => 'Sport' ,
            'description' => 'Sport cars are designed with an emphasis on performance and style.'

        ],
            ['nama' => 'Jeep' ,
            'description' => 'A Jeep is a brand of car originally from the United States, currently owned by the multinational corporation Stellantis. Today, the Jeep lineup consists entirely of sport utility vehicles (SUVs).'

        ],
            ['nama' => 'Pickup' ,
            'description' => ' A type of vehicle that has a passenger cabin and an open loading area at the rear, commonly called a tub'

        ],
            ['nama' => 'Truck' ,
            'description' => ' A vehicle with four or more wheels to transport goods.'

        ],
            ['nama' => 'Van' , 
            'description' => 'A van, also sometimes referred to as a delivery van or cargo van, is a type of motor vehicle that prioritizes cargo space over passenger comfort.'

            ]
        ];
        

        
        foreach ($jenis_kendaraan as $jenis) {
            JenisKendaraan::updateOrCreate(['nama' => $jenis['nama']], $jenis);
            JenisKendaraan::updateOrCreate(['description' => $jenis['description']], $jenis);
        }
    }
}
