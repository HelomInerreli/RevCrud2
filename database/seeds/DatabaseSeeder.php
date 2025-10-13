<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(CourseSeeder::class);
    }
}
