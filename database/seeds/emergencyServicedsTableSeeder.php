<?php

use Illuminate\Database\Seeder;

class emergencyServicedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\EmergencyServices::class, 6)->create();
    }
}
