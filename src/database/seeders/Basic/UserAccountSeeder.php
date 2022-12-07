<?php

namespace Database\Seeders\Basic;

use Database\Seeders\BaseSeeder;
use App\Models\Basic\UserAccount;

class UserAccountSeeder extends BaseSeeder
{

    /**
     * @return void
     */
    public function run(): void
    {
        UserAccount::insert([
            [
                UserAccount::COLUMN_USER_ID => 1,
                UserAccount::COLUMN_ACCOUNT_NUMBER => "xxxx-xxxx-xxxx-0001",
            ], [
                UserAccount::COLUMN_USER_ID => 1,
                UserAccount::COLUMN_ACCOUNT_NUMBER => "xxxx-xxxx-xxxx-0002",
            ], [
                UserAccount::COLUMN_USER_ID => 1,
                UserAccount::COLUMN_ACCOUNT_NUMBER => "xxxx-xxxx-xxxx-0003",
            ], [
                UserAccount::COLUMN_USER_ID => 1,
                UserAccount::COLUMN_ACCOUNT_NUMBER => "xxxx-xxxx-xxxx-0004",
            ], [
                UserAccount::COLUMN_USER_ID => 1,
                UserAccount::COLUMN_ACCOUNT_NUMBER => "xxxx-xxxx-xxxx-0005",
            ],

        ]);
    }
}
