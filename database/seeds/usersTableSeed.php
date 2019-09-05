<?php

use App\Models\Auth\User\User;
use Illuminate\Database\Seeder;
class usersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create();
    }

}
