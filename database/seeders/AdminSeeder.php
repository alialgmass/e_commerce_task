<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin=User::create([
           'name'=>'admin',
           'email'=>'admin@admin.com',
           'phone'=>'0122222222',
           'password'=>'12345678'
        ]);
        $admin->assignRole('admin');
    }
}
