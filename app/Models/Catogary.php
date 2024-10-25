<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Catogary extends Model
{
    /**
     * Get the service_fee that owns the Catogary
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service_fee(): BelongsTo
    {
        return $this->belongsTo(ServiceFee::class);
    }
}
