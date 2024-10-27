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
        Schema::create('general_forms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('other_text')->nullable();
            $table->string('f_name');
            $table->string('m_name')->nullable();
            $table->string('l_name');
            $table->date('birthdate')->nullable();
            $table->string('country_iso_mobile');
            $table->string('mobile');
            $table->string('country_code');
            $table->string('email');
            $table->string('appellant_nation');
            $table->text('appellant_address');
            $table->text('enquiry_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_forms');
    }
};
