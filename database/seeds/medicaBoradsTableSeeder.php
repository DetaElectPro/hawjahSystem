<?php

use Illuminate\Database\Seeder;

class medicaBoradsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MedicalBoard::class, 5)->create();

    }
}
