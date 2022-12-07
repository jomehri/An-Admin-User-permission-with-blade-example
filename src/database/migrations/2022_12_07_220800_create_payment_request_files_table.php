<?php

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
    }

    /**
     * @param Blueprint $table
     * @return void
     */
    protected function alterTable(Blueprint $table): void
    {
    }
}
