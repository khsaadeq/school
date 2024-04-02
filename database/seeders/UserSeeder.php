<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @var array<int, string>
     */
    public function run(): void
    {
         $user  =User::create(['name' => 'Flight',
         'email' => 'email@gmail.com',
         'phone' => '5464510',
         'role' => 'super admin',
         'birth_date' => '2000-07-10',
         'status' => '',
         'password' =>Hash::make ('adm1234'),
         'type_user_id' => '1',
        ]);
        $user->assignRole('super admin');
    }
}
