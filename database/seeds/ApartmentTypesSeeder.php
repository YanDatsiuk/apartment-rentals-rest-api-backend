<?php

use Illuminate\Database\Seeder;

class ApartmentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\REST\ApartmentType::firstOrCreate([
            'name' => 'CONVERTIBLE'
        ]);

        \App\REST\ApartmentType::firstOrCreate([
            'name' => 'STUDIO'
        ]);

        \App\REST\ApartmentType::firstOrCreate([
            'name' => 'CONVERTIBLE STUDIO'
        ]);

        \App\REST\ApartmentType::firstOrCreate([
            'name' => 'ALCOVE STUDIO'
        ]);

        \App\REST\ApartmentType::firstOrCreate([
            'name' => 'LOFT'
        ]);

        \App\REST\ApartmentType::firstOrCreate([
            'name' => 'TWO-BEDROOM'
        ]);

        \App\REST\ApartmentType::firstOrCreate([
            'name' => 'THREE-ROOM'
        ]);

        \App\REST\ApartmentType::firstOrCreate([
            'name' => 'DUPLEX'
        ]);

        \App\REST\ApartmentType::firstOrCreate([
            'name' => 'TRIPLEX'
        ]);

        \App\REST\ApartmentType::firstOrCreate([
            'name' => 'GARDEN APARTMENT'
        ]);
    }
}
