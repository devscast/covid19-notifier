<?php

use App\User;
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

        $adminUser = new User();
        $adminUser->name = env('APP_DEFAULT_ADMIN_NAME');
        $adminUser->email = env('APP_DEFAULT_ADMIN_EMAIL');
        $adminUser->password = Hash::make(env('APP_DEFAULT_ADMIN_PASSWORD'));
        $adminUser->save();
    }
}
