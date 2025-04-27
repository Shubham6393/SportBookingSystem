<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facilities = [
            [
                'name' => 'Cricket Ground',
                'description' => 'Full-size cricket ground with well-maintained pitch, boundary ropes, and practice nets.',
                'price_per_hour' => 1200.00,
                'is_available' => true,
            ],
            [
                'name' => 'Field Hockey Ground',
                'description' => 'Standard field hockey ground with artificial turf, markings, and goals.',
                'price_per_hour' => 1100.00,
                'is_available' => true,
            ],
            [
                'name' => 'Football Ground',
                'description' => 'Regulation-size football field with natural grass, goal posts, and field markings.',
                'price_per_hour' => 1300.00,
                'is_available' => true,
            ],
            [
                'name' => 'Tennis Court',
                'description' => 'Professional-grade tennis court with acrylic surface, net, posts, and line markings.',
                'price_per_hour' => 1000.00,
                'is_available' => true,
            ],
            [
                'name' => 'Badminton Court',
                'description' => 'Indoor badminton court with proper lighting, flooring, net and posts.',
                'price_per_hour' => 1050.00,
                'is_available' => true,
            ],
            [
                'name' => 'Kabaddi Ground',
                'description' => 'Traditional kabaddi ground with proper markings and soft surface for safe play.',
                'price_per_hour' => 1150.00,
                'is_available' => true,
            ],
            [
                'name' => 'Kho-Kho Ground',
                'description' => 'Standard Kho-Kho court with proper dimensions, poles and markings as per regulations.',
                'price_per_hour' => 1100.00,
                'is_available' => true,
            ],
            [
                'name' => 'Athletics Track',
                'description' => '400m standard athletics track with lanes, long jump pit, and shot put area.',
                'price_per_hour' => 1250.00,
                'is_available' => true,
            ],
            [
                'name' => 'Basketball Court',
                'description' => 'Full-size basketball court with high-quality flooring, hoops, and markings.',
                'price_per_hour' => 1150.00,
                'is_available' => true,
            ],
            [
                'name' => 'Volleyball Court',
                'description' => 'Standard volleyball court with proper flooring, net, and boundary markings.',
                'price_per_hour' => 1050.00,
                'is_available' => true,
            ],
        ];

        foreach ($facilities as $facility) {
            Facility::create($facility);
        }

        $this->command->info('Added ' . count($facilities) . ' facilities.');
    }
}
