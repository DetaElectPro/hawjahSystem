<?php

use Illuminate\Database\Seeder;

class medicaFieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MedicalField::class, 5)->create();
    }
}
