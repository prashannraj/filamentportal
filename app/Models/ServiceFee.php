<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceFee extends Model
{
    /**
     * Get the user that owns the ServiceFee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    /**
     * Get all of the catogary for the ServiceFee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function catogary(): HasMany
    {
        return $this->hasMany(Catogary::class);
    }
}
