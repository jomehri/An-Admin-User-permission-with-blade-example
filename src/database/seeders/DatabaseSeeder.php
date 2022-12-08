<?php

namespace Database\Seeders;

use Database\Seeders\Basic\UserSeeder;
use Database\Seeders\Basic\UserAccountSeeder;
use Database\Seeders\Basic\UserRolePermissionSeeder;

class DatabaseSeeder extends BaseSeeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            UserAccountSeeder::class,
        ]);
    }
}
