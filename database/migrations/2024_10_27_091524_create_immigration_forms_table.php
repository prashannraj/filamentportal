<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('immigration_forms', function (Blueprint $table) {
            $table->id();
            $table->date('refusalletterdte');
            $table->date('refusalreceiveddata');
            $table->string('applicationlocation');
            $table->string('uan');
            $table->string('ho_ref');
            $table->string('decison_received');
            $table->string('title');
            $table->text('other_text')->nullable();
            $table->string('f_name')->nullable();
            $table->string('m_name')->nullable();
            $table->string('l_name')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('nation_of');
            $table->string('mobile');
            $table->string('country_code');
            $table->string('email');
            $table->string('contact_email');
            $table->string('appellant_nation');
            $table->text('appellant_address');
            $table->boolean('has_uk_sponsor')->default(false);
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_relation')->nullable();
            $table->string('sponsor_email')->nullable();
            $table->string('sponsor_phone')->nullable();
            $table->text('sponsor_address')->nullable();
            $table->string('sponsor_city')->nullable();
            $table->boolean('sponsor_preferred')->default(false);
            $table->string('sponsor_preEmail')->nullable();
            $table->string('preparedby')->nullable();
            $table->string('visa')->nullable();
            $table->string('prepared_email')->nullable();
            $table->string('appellant_email')->nullable();
            $table->boolean('authorise')->default(false);
            $table->string('authorise_name')->nullable();
            $table->text('extra_details')->nullable();
            $table->string('refusal_document')->nullable();
            $table->string('appellant_passport')->nullable();
            $table->text('proff_address')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('immigration_forms');
    }
};
