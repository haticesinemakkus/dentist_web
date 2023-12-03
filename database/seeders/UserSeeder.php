<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [[
            'id' => 1,
            'name' => 'Hatice Sinem',
            'surname' => 'Akkuş',
            'email' => 'sinemakkus@gmail.com',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'id' => 2,
            'name' => 'Mehmet Talha',
            'surname' => 'Koyun',
            'email' => 'talhakoyun@gmail.com',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],];

        DB::table('admin')->insert($items);
    }
}
