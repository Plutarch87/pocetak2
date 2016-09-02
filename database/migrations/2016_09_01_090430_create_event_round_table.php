<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventRoundTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('event_round', function(Blueprint $table)
        {
            $table->integer('round_id')->unsigned()->index();
            $table->foreign('round_id')->references('id')->on('rounds')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::drop('event_round');
    }

}
