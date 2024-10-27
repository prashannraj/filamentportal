<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enquiry extends Model
{

    protected $fillable = [
        'name',
        'title',
        'status',
        'type',
        'click_count', // Add click_count to fillable properties
    ];
    /**
     * Get all of the comments for the Enquiry
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enquiry_forms(): HasMany
    {
        return $this->hasMany(EnquiryForm::class);
    }

    public function getTypeLabel(): string
    {
        return match ($this->type) {
            'general_form' => 'General Form',
            'immigration_form' => 'Immigration Form',
            default => 'Unknown',
        };
    }

    public function incrementClickCount()
    {
        $this->increment('click_count');
    }
}
