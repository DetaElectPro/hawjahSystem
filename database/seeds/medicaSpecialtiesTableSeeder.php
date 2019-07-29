<?php

use Illuminate\Database\Seeder;

class medicaSpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MedicalSpecialty::class, 5)->create();
    }
}
