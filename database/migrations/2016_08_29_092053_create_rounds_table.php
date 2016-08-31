<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoundsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rounds', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('event_id');
            $table->string('player');
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
		Schema::drop('rounds');
	}

}
