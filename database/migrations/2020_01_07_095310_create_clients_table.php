<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->string('password');
			$table->string('phone')->unique();
			$table->date('data_of_birth');
			$table->boolean('status')->nullable();
			$table->date('last_donation_data');
			$table->string('pin_code')->nullable();
			$table->integer('blood_type_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->string('api_token')->unique()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
