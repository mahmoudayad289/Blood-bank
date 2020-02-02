<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('app_about');
			$table->string('phone');
			$table->string('email');
			$table->string('f_link');
			$table->string('t_link');
			$table->string('y_link');
			$table->string('insta_link');
			$table->string('whats_number');
			$table->string('goole_plus_link');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}
