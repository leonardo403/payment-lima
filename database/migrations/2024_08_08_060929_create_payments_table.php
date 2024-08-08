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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_cpf');
            $table->string('billing_type');
            $table->decimal('value', 10, 2);
            $table->date('due_date')->nullable();
            $table->string('invoice_url')->nullable();
            $table->string('pix_qr_code')->nullable();
            $table->string('pix_copia_cola')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
