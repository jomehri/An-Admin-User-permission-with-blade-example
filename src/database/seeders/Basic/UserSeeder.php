<?php

namespace Database\Seeders\Basic;

use App\Models\User;
use Database\Seeders\BaseSeeder;

class UserSeeder extends BaseSeeder
{

    /**
     * @return void
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'alibaba_user',
                'email' => 'user@alibaba.ir',
                'email_verified_at' => now(),
                'password' => bcrypt("123456"),
            ],
            [
                'name' => 'alibaba_admin',
                'email' => 'admin@alibaba.ir',
                'email_verified_at' => now(),
                'password' => bcrypt("123456"),
            ],
        ]);
    }
}
