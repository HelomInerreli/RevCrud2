<?php

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            ['name' => 'Escola de Lisboa', 'city' => 'Lisboa', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Escola do Porto', 'city' => 'Porto', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Escola de Coimbra', 'city' => 'Coimbra', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Escola de Braga', 'city' => 'Braga', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
