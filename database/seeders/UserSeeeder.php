<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "admin";
        $user->email ="admin@xx.cc";
        $user->password=Hash::make("123456789");
        $user->role="admin";
        $user->save(); 
        
        $user = new User();
        $user->name = "editor";
        $user->email ="editor@xx.cc";
        $user->password=Hash::make("123456789");
        $user->role="editor";
        $user->save();
    }
}
