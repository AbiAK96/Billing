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
        Schema::create('billing_tax', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_id');
            $table->string('billing_id');
            $table->integer('tax_id');
            $table->string('percentage');
            $table->decimal('tax_price', 10, 2);
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
        Schema::dropIfExists('billing_tax');
    }
};
