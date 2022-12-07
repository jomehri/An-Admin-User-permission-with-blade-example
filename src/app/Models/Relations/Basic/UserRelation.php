<?php

namespace App\Models\Relations\Basic;

use App\Models\Basic\UserAccount;
use Illuminate\Database\Eloquent\Relations\HasMany;

Trait UserRelation
{

    /**
     * et user accounts
     *
     * @return HasMany
     */
    public function Accounts(): HasMany
    {
        return $this->hasMany(UserAccount::class);
    }
}
