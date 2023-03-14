<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $user->name = 'Trịnh Phong Tâm';
        $user->email = 'tamphongtrinh1991@gmail.com';
        $user->password = Hash::make('123456');
        $user->birthday = '1992/01/25';
        $user->address = 'Quảng Trị';
        $user->image = '1jCVdawgaYEAN8g7RCOxHH1mkA9IJcixSfQlmkNk.png';
        $user->phone = '0857744797';
        $user->gender = 'Nam';
        $user->group_id = '1';
        $user->save();
    }
}
