<?php

use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'title' => 'admin',
                'description' => 'admin'
            ],[
                'title' => 'regular',
                'description' => 'regular'
            ]

        ]);
    }
}
