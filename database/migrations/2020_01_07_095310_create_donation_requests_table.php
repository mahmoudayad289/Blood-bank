<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('age');
            $table->integer('number_of_bags');
            $table->string('hospital_name');
            $table->string('hospital_address');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->integer('blood_type_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('city_id')->unsigned();
			$table->string('number');
			$table->text('message');
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}
