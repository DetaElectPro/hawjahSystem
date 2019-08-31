<?php

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
        self::group();
        factory(App\User::class, 5)->create();
    }

    public function group()
    {
        DB::table('groups')->insert([
            'name' => 'admin',
        ]);

        DB::table('groups')->insert([
            'name' => 'boss',
        ]);

        DB::table('groups')->insert([
            'name' => 'user',
        ]);
    }
}
