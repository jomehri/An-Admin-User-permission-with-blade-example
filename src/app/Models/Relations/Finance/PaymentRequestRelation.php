<?php

namespace App\Models\Relations\Basic;

use App\Models\Finance\PaymentRequestFile;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

Trait PaymentRequestRelation
{

    /**
     * Get user
     *
     * @return BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get user accounts
     *
     * @return BelongsTo
     */
    public function Accounts(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get payment reqeust files
     *
     * @return HasMany|null
     */
    public function Files(): ?HasMany
    {
        return $this->HasMany(PaymentRequestFile::class);
    }
}
