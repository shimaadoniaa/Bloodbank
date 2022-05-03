<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	public function up()
	{
		Schema::create('contacts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('email');
			$table->string('phone');
			$table->('social', array('fb','youtube','insta','google','tw'));
			$table->text('title_msg');
			$table->text('message');
		});
	}

	public function down()
	{
		Schema::drop('contacts');
	}
}



