<?php

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            'name'              => 'store',
            'branch_name'       => '幕張支店',
            'email'             => 'store@example.com',
            'address'           => '千葉県',
            'password'          => Hash::make('12345678'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
