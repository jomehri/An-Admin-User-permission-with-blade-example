<?php

use App\Models\User;
use App\Models\Basic\UserAccount;
use App\Models\Finance\PaymentRequest;
use Illuminate\Database\Schema\Blueprint;
use App\Database\Migration\BaseMigration;

class CreatePaymentRequestsTable extends BaseMigration
{

    /**
     *
     */
    public function __construct()
    {
        parent::__construct(PaymentRequest::getDBTable());
    }

    /**
     * @param Blueprint $table
     * @return void
     */
    protected function createTable(Blueprint $table): void
    {
        $table->unsignedInteger(PaymentRequest::COLUMN_USER_ID)->nullable(false);
        $table->unsignedInteger(PaymentRequest::COLUMN_USER_ACCOUNT_ID)->nullable(false);
        $table->unsignedDecimal(PaymentRequest::COLUMN_AMOUNT, 16, 2)->nullable(false);
        $table->enum(PaymentRequest::COLUMN_STATUS, PaymentRequest::STATUSES)->nullable(false);

        /**
         * References and foreign keys and delete actions
         */
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
        $table->foreign(PaymentRequest::COLUMN_USER_ID)
            ->references('id') // permission id
            ->on(User::getDBTable())
            ->onDelete('cascade');

        $table->foreign(PaymentRequest::COLUMN_USER_ACCOUNT_ID)
            ->references('id') // permission id
            ->on(UserAccount::getDBTable())
            ->onDelete('cascade');
    }
}
