<?php

namespace App\Models\Relations\Basic;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

Trait UserAccountRelation
{

    /**
     * et user accounts
     *
     * @return BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
