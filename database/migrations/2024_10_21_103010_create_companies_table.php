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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('footnote');
            $table->string('address');
            $table->string('registration_no');
            $table->string('website');
            $table->string('logo');
            $table->string('stamp');
            $table->string('telephone');
            $table->string('email');
            $table->string('registred_in');
            $table->string('regulated_by');
            $table->string('regulated_logo');
            $table->string('vat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
