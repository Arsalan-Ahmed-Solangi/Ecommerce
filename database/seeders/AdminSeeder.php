<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;
use Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'admin_id'      =>  Str::uuid()->toString(),
            'user_name'     => "admin",
            'user_password' => Hash::make('12344321'),
            'status'        => 1,
            'created_at'    => date("d-m-y h:i:s"),
            'updated_at'    => date("d-m-y h:i:s"),
        ]);
    }
}
