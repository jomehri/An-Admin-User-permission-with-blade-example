<?php

namespace App\Models\Relations\Finance;

use App\Models\Finance\PaymentRequest;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait PaymentRequestFileRelation
{

    /**
     * et user accounts
     *
     * @return BelongsTo
     */
    public function PaymentRequest(): BelongsTo
    {
        return $this->belongsTo(PaymentRequest::class);
    }

    /**
     * et user accounts
     *
     * @return BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->PaymentRequest()->User();
    }
}
