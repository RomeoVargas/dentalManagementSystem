<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDentistScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentist_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dentist_id');
            $table->string('days');
            $table->time('time_start');
            $table->time('time_end');
            $table->index(['time_start', 'time_end']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dentist_schedule');
    }
}
