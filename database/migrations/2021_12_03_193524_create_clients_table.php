<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('phone');
			$table->string('password');
			$table->string('name');
			$table->string('email');
			$table->date('d_o_b');
			$table->integer('blood_type_id');
			$table->timestamps();
			$table->string('last_donation_date');
			$table->integer('city_id');
			$table->string('pin_code')->nullable();
			$table->string('api_token', 70)->unique()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
