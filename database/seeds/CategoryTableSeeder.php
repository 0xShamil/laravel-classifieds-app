<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Electronics & Appliances',
                'children' => [
                    ['name' => 'Computers & Laptops'],
                    ['name' => 'Hard Disks, Printers & Monitors'],
                    ['name' => 'ACs'],
                    ['name' => 'Washing Machines'],
                    ['name' => 'Fridges'],
                    ['name' => 'Computer Accessories'],
                    ['name' => 'Cameras & Lenses'],
                    ['name' => 'Games & Entertainment'],
                    ['name' => 'Kitchen & Other Appliances'],
                ]
            ],
            [
                'name' => 'Mobiles',
                'children' => [
                    ['name' => 'Mobile Phones'],
                    ['name' => 'Tablets'],
                    ['name' => 'Accessories'],
                ]
            ],
            [
                'name' => 'Books, Sports & Hobbies',
                'children' => [
                    ['name' => 'Books'],
                    ['name' => 'Musical Instruments'],
                    ['name' => 'Sports Equipments'],
                    ['name' => 'Gym & Fitness'],
                    ['name' => 'Other Hobbies'],
                ]
            ],
            [
                'name' => 'Cars',
                'children' => [
                    ['name' => 'Cars'],
                    ['name' => 'Commercial Vehicles'],
                    ['name' => 'Other Vehicles'],
                    ['name' => 'Spare Parts'],
                ]
            ],
            [
                'name' => 'Bikes',
                'children' => [
                    ['name' => 'Motorcycles'],
                    ['name' => 'Scooters'],
                    ['name' => 'Bicyles'],
                    ['name' => 'Spare Parts'],
                ]
            ],
            [
                'name' => 'Fashion',
                'children' => [
                    ['name' => 'Men'],
                    ['name' => 'Women'],
                ]
            ],
            [
                'name' => 'Pets',
                'children' => [
                    ['name' => 'Fishes & Aquarium'],
                    ['name' => 'Dogs'],
                    ['name' => 'Other Pets'],
                    ['name' => 'Pet Food & Accessories'],
                ]
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
