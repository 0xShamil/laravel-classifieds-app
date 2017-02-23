<?php

use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                'name' => 'India',
                'children' => [
                    [
                        'name' => 'Delhi',
                        'children' => [
                            ['name' => 'Vasant Vihar'],
                            ['name' => 'Sundar Nagar'],
                            ['name' => 'Defence Colony'],
                            ['name' => 'South Extension'],
                            ['name' => 'Panchsheel'],
                        ],
                    ],
                    [
                        'name' => 'Mumbai',
                        'children' => [
                            ['name' => 'Bandra'],
                            ['name' => 'Andheri'],
                            ['name' => 'Juhu'],
                            ['name' => 'South Mumbai'],
                        ],
                    ],
                    [
                        'name' => 'Chennai',
                        'children' => [
                            ['name' => 'Avadi'],
                            ['name' => 'Central'],
                            ['name' => 'Nugambakkam'],
                            ['name' => 'Adyar'],
                            ['name' => 'Velachery'],
                        ],
                    ],
                    [
                        'name' => 'Guwahati',
                        'children' => [
                            ['name' => 'Jalukbari'],
                            ['name' => 'Paltanbazar'],
                            ['name' => 'Ganeshguri'],
                            ['name' => 'Six Mile'],
                            ['name' => 'Dispur'],
                        ],
                    ],
                    [
                        'name' => 'Kolkata',
                        'children' => [
                            ['name' => 'Kasba'],
                            ['name' => 'Tollygunge'],
                            ['name' => 'Jadavpur'],
                            ['name' => 'Dum Dum'],
                            ['name' => 'Rajarhat'],
                            ['name' => 'Behala'],
                            ['name' => 'New Alipur'],
                            ['name' => 'Ballygunge'],
                            ['name' => 'Salt Lake'],
                            ['name' => 'Hoogly'],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($areas as $area) {
            \App\Area::create($area);
        }
    }
}
