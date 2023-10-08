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
		Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_id');
            $table->string('first_name');
			$table->string('last_name');
			$table->string('address_line_1');
			$table->string('address_line_2')->nullable();
			$table->string('county')->nullable();
			$table->string('city');
			$table->string('post_code');
			$table->string('country');
			$table->string('mobile_no');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
			$table->string('identity_no')->nullable()->default(null);
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('users');
    }
};
