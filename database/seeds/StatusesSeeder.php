<?php

use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\REST\Status::firstOrCreate([
            'name' => 'pre-book'
        ]);

        \App\REST\Status::firstOrCreate([
            'name' => 'reserved'
        ]);

        \App\REST\Status::firstOrCreate([
            'name' => 'cancelled'
        ]);
    }
}
