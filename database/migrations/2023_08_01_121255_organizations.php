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
		Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('organization_name');
			$table->string('address_line_1');
			$table->string('address_line_2')->nullable()->default(null);
			$table->string('county')->nullable()->default(null);
			$table->string('city')->nullable()->default(null);
			$table->string('post_code')->nullable()->default(null);
			$table->string('country')->nullable()->default(null);;
			$table->string('mobile_no')->nullable()->default(null);
            $table->string('logo')->nullable()->default(null);
            $table->integer('status_id');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizations');
    }
};
