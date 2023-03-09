<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->name = 'group';
        $user->email = 'group@hotmail.com';
        $user->password = bcrypt('12345');
        $user->save();
    }
}
