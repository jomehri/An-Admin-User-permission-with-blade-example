<?php

namespace App\Models\Relations\Finance;

use App\Models\User;
use App\Models\Finance\PaymentRequestFile;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
