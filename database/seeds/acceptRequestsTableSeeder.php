<?php

use Illuminate\Database\Seeder;

class acceptRequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\AcceptRequest::class, 5)->create();

    }
}
