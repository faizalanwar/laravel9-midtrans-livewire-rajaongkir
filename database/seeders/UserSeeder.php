<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; 
use App\Models\User;
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
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->level = '1';
        $user->email_verified_at = '2001-01-1 01:01:01';
        $user->save();

 		$user1 = new User();
        $user1->name = 'User';
        $user1->email = 'user@gmail.com';
        $user1->password = Hash::make('12345678');
        $user1->level = '0';
        $user1->email_verified_at = '2001-01-1 01:01:01';
        $user1->save();
    }
}
