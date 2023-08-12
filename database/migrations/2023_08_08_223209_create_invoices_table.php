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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->string('section');
            $table->string('product');
            $table->date('invoice_date');
            $table->date('invoice_due_date');
            $table->string('discount');
            $table->string('tax_rate');
            $table->decimal('tax_value',8,2);
            $table->decimal('total',8,2);
            $table->string('invoice_status',length:50);
            $table->integer('status');
            $table->text('note')->nullable();
            $table->string('user');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};