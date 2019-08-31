<?php

use Illuminate\Database\Seeder;

class requestSpecialistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\RequestSpecialist::class, 5)->create();
    }
}
