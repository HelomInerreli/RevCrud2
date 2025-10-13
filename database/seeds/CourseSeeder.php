<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            factory(App\Course::class)->create(['teacher_id' => $i]);
            factory(App\Course::class)->create(['teacher_id' => $i]);
        }
    }
}
