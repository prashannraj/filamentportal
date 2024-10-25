<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    protected $appends = ['logo_url','stamp_url','regulation_logo_url'];
    protected $fillable = [
        'name',
        'footnote',
        'address',
        'registration_no',
        'website',
        'logo', // Add logo field
        'stamp',
        'telephone',
        'email',
        'registred_in',
        'regulated_by',
        'regulated_logo', // Add regulated logo field
        'vat',
    ];


    public function getLogoUrlAttribute()
{
    return $this->logo ? Storage::url($this->logo) : null;
}


	public function getRegulationLogoUrlAttribute() // Correct method name
    {
        return $this->regulated_logo ? Storage::url($this->regulated_logo) : null;
    }


	public function getStampUrlAttribute(){
		return $this->stamp ? Storage::url($this->stamp) : null;;

	}
    //
    /**
     * Get all of the comments for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function company_banches(): HasMany
    {
        return $this->hasMany(CompanyBanch::class);
    }
    /**
     * Get all of the comments for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function company_documents(): HasMany
    {
        return $this->hasMany(CompanyDocument::class);
    }
    /**
     * Get all of the comments for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function company_advisors(): HasMany
    {
        return $this->hasMany(CompanyAdvisor::class);
    }

    /**
     * Get all of the comments for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function service_fees(): HasMany
    {
        return $this->hasMany(ServiceFee::class);
    }

    /**
     * Get all of the templates for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function templates(): HasMany
    {
        return $this->hasMany(Template::class);
    }

    /**
     * Get all of the comments for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function email_senders(): HasMany
    {
        return $this->hasMany(EmailSender::class);
    }
}

