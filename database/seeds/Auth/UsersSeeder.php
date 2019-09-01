<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class UsersSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('users');

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => '0114847112',
                'password' => bcrypt('admin'),
                'active' => true,
                'confirmation_code' => Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Demo',
                'email' => 'demo@gmail.com',
                'phone' => '0917321783',
                'password' => bcrypt('demo'),
                'active' => true,
                'confirmation_code' => Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('users')->insert($users);

        $this->enableForeignKeys();
    }
}
