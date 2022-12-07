<?php

use App\Models\Basic\UserAccount;
use App\Models\User;
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

        $this->references($table);
    }

    /**
     * @param Blueprint $table
     * @return void
     */
    protected function alterTable(Blueprint $table): void
    {
    }

    /**
     * @param Blueprint $table
     * @return void
     */
    public function references(Blueprint $table): void
    {
        $table->foreign(UserAccount::COLUMN_USER_ID)
            ->references('id') // permission id
            ->on(User::getDBTable())
            ->onDelete('cascade');
    }
}
