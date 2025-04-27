<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipment = [
            [
                'name' => 'Cricket Kit',
                'description' => 'Complete cricket kit with bats, balls, stumps, pads, gloves, and helmets for team practice.',
                'price_per_day' => 650.00,
                'quantity_available' => 5,
                'is_available' => true,
            ],
            [
                'name' => 'Field Hockey Kit',
                'description' => 'Complete hockey kit with 12 composite sticks, balls, goalkeeper equipment, and training accessories.',
                'price_per_day' => 550.00,
                'quantity_available' => 4,
                'is_available' => true,
            ],
            [
                'name' => 'Football Kit',
                'description' => 'Complete football kit with balls, training bibs, cones, and goalkeeper gloves.',
                'price_per_day' => 500.00,
                'quantity_available' => 6,
                'is_available' => true,
            ],
            [
                'name' => 'Tennis Kit',
                'description' => 'Complete tennis kit with rackets, balls, net measuring tools, and training aids.',
                'price_per_day' => 500.00,
                'quantity_available' => 7,
                'is_available' => true,
            ],
            [
                'name' => 'Badminton Kit',
                'description' => 'Complete badminton kit with carbon fiber rackets, shuttlecocks, and portable net system.',
                'price_per_day' => 450.00,
                'quantity_available' => 8,
                'is_available' => true,
            ],
            [
                'name' => 'Kabaddi Kit',
                'description' => 'Complete kabaddi kit with mats, knee pads, ankle supports, and training equipment.',
                'price_per_day' => 400.00,
                'quantity_available' => 5,
                'is_available' => true,
            ],
            [
                'name' => 'Kho-Kho Kit',
                'description' => 'Complete kho-kho kit with poles, marking equipment, and training accessories.',
                'price_per_day' => 350.00,
                'quantity_available' => 6,
                'is_available' => true,
            ],
            [
                'name' => 'Athletics Kit',
                'description' => 'Complete athletics kit with starting blocks, batons, hurdles, and measuring equipment.',
                'price_per_day' => 600.00,
                'quantity_available' => 3,
                'is_available' => true,
            ],
            [
                'name' => 'Basketball Kit',
                'description' => 'Complete basketball kit with balls, training cones, tactics board, and air pump.',
                'price_per_day' => 550.00,
                'quantity_available' => 4,
                'is_available' => true,
            ],
            [
                'name' => 'Volleyball Kit',
                'description' => 'Complete volleyball kit with balls, portable net system, antennae, and boundary markers.',
                'price_per_day' => 500.00,
                'quantity_available' => 5,
                'is_available' => true,
            ],
        ];

        foreach ($equipment as $item) {
            Equipment::create($item);
        }

        $this->command->info('Added ' . count($equipment) . ' equipment items.');
    }
}
