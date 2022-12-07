<?php

namespace App\Models\Basic;

use App\Models\BaseModel;

class UserAccount extends BaseModel
{

    /**
     * @return string
     */
    public static function getDBTable(): string
    {
        return 'user_accounts';
    }

    /**
     * @return string
     */
    public static function getGroup(): string
    {
        return 'Basic';
    }

    /**
     * Columns
     */
    const COLUMN_USER_ID = 'user_id';
    const COLUMN_ACCOUNT_NUMBER = 'account_number';

}
