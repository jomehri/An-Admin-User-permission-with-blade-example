<?php

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use App\Database\Migration\BaseMigration;

class CreateUsersTable extends BaseMigration
{

    /**
     *
     */
    public function __construct()
    {
        parent::__construct(User::getDBTable());
    }

    /**
     * @param Blueprint $table
     * @return void
     */
    protected function createTable(Blueprint $table): void
    {
        $table->string(User::COLUMN_NAME, 100)->nullable(false);
        $table->string(User::COLUMN_EMAIL, 150)->nullable(false)->unique();
        $table->dateTime(User::COLUMN_EMAIL_VERIFIED_AT)->nullable();
        $table->string(User::COLUMN_PASSWORD, 50)->nullable(false);
        $table->string('remember_token', 100)->nullable();
    }

    /**
     * @param Blueprint $table
     * @return void
     */
    protected function alterTable(Blueprint $table): void
    {
    }
}
