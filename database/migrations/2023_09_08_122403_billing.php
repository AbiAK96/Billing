<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_id');
            $table->string('invoice_id');
            $table->integer('customer_id');
            $table->string('invoice_reference')->nullable()->default(null);
			$table->string('payment_description')->nullable()->default(null);
            $table->string('additional_note')->nullable()->default(null);
            $table->string('payment_method')->nullable()->default(null);
            $table->string('payment_reference')->nullable()->default(null);
			$table->decimal('net_price', 10, 2);
            $table->decimal('tax_price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable()->default(0);
            $table->decimal('gross_price', 10, 2);
            $table->string('created_by');
			$table->integer('status_id');
			$table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing');
    }
};
