<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokensTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('token', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('token');
			$table->integer('is_used');
			$table->string('link');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')
										->on('users')
										->onDelete('cascade')
										->onUpdate('cascade');
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
		Schema::drop('token');
	}

}
