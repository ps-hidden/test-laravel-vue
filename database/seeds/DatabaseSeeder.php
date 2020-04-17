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
        // $this->call(UserSeeder::class);
        factory(\App\Model\User::class, 10)->create();
        factory(\App\Model\Option::class, 20)->create();
        factory(\App\Model\Company::class, 10000)->create();
        factory(\App\Model\Employee::class, 10000)->create();
    }
}
