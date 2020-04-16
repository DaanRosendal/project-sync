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
        for($i = 1; $i <= 10; $i++)
        DB::table('users')->insert([
            'name' => 'Daan',
            'email' => 'a' . rand(1, 100000) . '@daanrosendal.com',
            'password' => Hash::make('wachtwoord'),
            'is_admin' => 1
        ]);
    }
}
