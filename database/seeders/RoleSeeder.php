<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [[
            'id' => 1,
            'name' => 'Super Admin',
            'slug' => 'super admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ], [
            'id' => 2,
            'name' => 'Personel',
            'slug' => 'staff',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],];

        DB::table('roles')->insert($items);
    }
}
