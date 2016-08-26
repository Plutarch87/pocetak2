<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name')->index();
            $table->string('type')->index();
            $table->softDeletes();
            $table->boolean('active')->nullable();
            $table->integer('playerNo');
            $table->integer('scoreTotal');
            $table->integer('matches');
            $table->integer('sets');
            $table->integer('points');
            $table->integer('wins');
            $table->integer('loss');
            $table->integer('draw');
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
		Schema::drop('events');
	}

}
