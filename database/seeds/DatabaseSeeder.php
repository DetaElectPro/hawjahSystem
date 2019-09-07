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
        $this->call(usersTableSeed::class);
        $this->call(UsersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UsersRolesSeeder::class);
        $this->call(employsTableSeed::class);
        $this->call(medicaBoradsTableSeeder::class);
        $this->call(medicaFieldsTableSeeder::class);
        $this->call(medicaSpecialtiesTableSeeder::class);
        $this->call(requestSpecialistsTableSeeder::class);
        $this->call(acceptRequestsTableSeeder::class);
//        $this->call(emergencyServicedsTableSeeder::class);

    }
}