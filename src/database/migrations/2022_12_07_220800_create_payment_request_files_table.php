<?php

use App\Models\Finance\PaymentRequest;
use Illuminate\Database\Schema\Blueprint;
use App\Database\Migration\BaseMigration;
use App\Models\Finance\PaymentRequestFile;

class CreatePaymentRequestFilesTable extends BaseMigration
{

    /**
     *
     */
    public function __construct()
    {
        parent::__construct(PaymentRequestFile::getDBTable());
    }

    /**
     * @param Blueprint $table
     * @return void
     */
    protected function createTable(Blueprint $table): void
    {
        $table->unsignedInteger(PaymentRequestFile::COLUMN_PAYMENT_REQUEST_ID)->nullable(false);
        $table->unsignedInteger(PaymentRequestFile::COLUMN_FILE_MANAGER_ID)->nullable(false);

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
        $table->foreign(PaymentRequestFile::COLUMN_PAYMENT_REQUEST_ID)
            ->references('id') // permission id
            ->on(PaymentRequest::getDBTable())
            ->onDelete('cascade');
    }
}
