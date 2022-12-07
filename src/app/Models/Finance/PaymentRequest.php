<?php

namespace App\Models\Finance;

use App\Models\BaseModel;

class PaymentRequest extends BaseModel
{

    /**
     * @return string
     */
    public static function getDBTable(): string
    {
        return 'payment_requests';
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
    const COLUMN_USER_ID = 'user_id';
    const COLUMN_USER_ACCOUNT_ID = 'user_account_id';
    const COLUMN_AMOUNT = 'amount';
    const COLUMN_STATUS = 'status';

    /**
     * Enums
     */
    const STATUS_PENDING = 'pending';
    const STATUS_REJECTED = 'rejected';
    const STATUS_APPROVED = 'approved';
    const STATUSES = [
        self::STATUS_PENDING => self::STATUS_PENDING,
        self::STATUS_REJECTED => self::STATUS_REJECTED,
        self::STATUS_APPROVED => self::STATUS_APPROVED,
    ];

}
