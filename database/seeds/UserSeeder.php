<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'name' => 'udin',
            'username' => 'udin12',
            'telp' => 6285888,
            'email' => 'udin@gmail.com',
            'password' => Hash::make('udin'),
            'saldo' => 4500000
        ]);
        DB::table('user')->insert([
            'name' => 'tomat',
            'username' => 'tomat12',
            'telp' => 621221,
            'email' => 'tomat@gmail.com',
            'password' => Hash::make('tomat'),
            'saldo' => 4500000
        ]);
    }
}
