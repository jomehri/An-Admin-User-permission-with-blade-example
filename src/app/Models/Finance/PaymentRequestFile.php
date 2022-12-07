<?php

namespace App\Models\Finance;

use App\Models\BaseModel;
use App\Models\Relations\Finance\PaymentRequestFileRelation;

class PaymentRequestFile extends BaseModel
{

    use PaymentRequestFileRelation;

    /**
     * @return string
     */
    public static function getDBTable(): string
    {
        return 'payment_request_files';
    }

    /**
     * @return string
     */
    public static function getGroup(): string
    {
        return 'Finance';
    }

    /**
     * Columns
     */
    const COLUMN_PAYMENT_REQUEST_ID = 'payment_request_id';
    const COLUMN_FILE_MANAGER_ID = 'file_manager_id';

}
