<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' =>'123456',
        ]);
    }
}
