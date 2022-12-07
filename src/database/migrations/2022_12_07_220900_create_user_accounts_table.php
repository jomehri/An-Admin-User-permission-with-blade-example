<?php

use App\Models\Basic\UserAccount;
use Illuminate\Database\Schema\Blueprint;
use App\Database\Migration\BaseMigration;

class CreateUserAccountsTable extends BaseMigration
{

    /**
     *
     */
    public function __construct()
    {
        parent::__construct(UserAccount::getDBTable());
    }

    /**
     * @param Blueprint $table
     * @return void
     */
    protected function createTable(Blueprint $table): void
    {
        $table->unsignedInteger(UserAccount::COLUMN_USER_ID)->nullable(false);
        $table->string(UserAccount::COLUMN_ACCOUNT_NUMBER)->nullable(false);
    }

    /**
     * @param Blueprint $table
     * @return void
     */
    protected function alterTable(Blueprint $table): void
    {
    }
}
