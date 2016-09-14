<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('results', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->integer('scoreTotal');
            $table->integer('matches');
            $table->integer('sets');
            $table->integer('points');
            $table->integer('wins');
            $table->integer('loss');
            $table->integer('draw');
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
		Schema::drop('results');
	}

}
