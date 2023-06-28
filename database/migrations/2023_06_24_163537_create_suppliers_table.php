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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->longText('tel');
            $table->string('supplier_brand_name');
            $table->string('supplier_type');
            $table->string('mobile_banking');
            $table->string('Mobile_banking_Account_number');
            $table->string('account_holder_name');
            $table->string('bank_name');
            $table->string('branch_name');
            $table->string('bank_account_number');
            $table->longText('current_address');
            $table->longText('parmanent_address');
            $table->string('image')->default('defult_photo.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
