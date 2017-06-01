<?php

use Illuminate\Database\Seeder;

class FacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\REST\Facility::firstOrCreate([
            'description' => 'Wireless Internet'
        ]);

        \App\REST\Facility::firstOrCreate([
            'description' => 'Kitchen'
        ]);

        \App\REST\Facility::firstOrCreate([
            'description' => 'Heating'
        ]);

        \App\REST\Facility::firstOrCreate([
            'description' => 'TV'
        ]);

        \App\REST\Facility::firstOrCreate([
            'description' => 'Wagter'
        ]);

        \App\REST\Facility::firstOrCreate([
            'description' => 'Intercom'
        ]);

        \App\REST\Facility::firstOrCreate([
            'description' => 'Breakfast'
        ]);

        \App\REST\Facility::firstOrCreate([
            'description' => 'Internet'
        ]);

        \App\REST\Facility::firstOrCreate([
            'description' => 'Cable TV'
        ]);

        \App\REST\Facility::firstOrCreate([
            'description' => 'Fireplace'
        ]);

        \App\REST\Facility::firstOrCreate([
            'description' => 'Air conditioning'
        ]);

        \App\REST\Facility::firstOrCreate([
            'description' => 'A place to work on a laptop'
        ]);

        \App\REST\Facility::firstOrCreate([
            'description' => 'Washer'
        ]);

        \App\REST\Facility::firstOrCreate([
            'description' => 'Iron'
        ]);
    }
}
