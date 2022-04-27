<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration for the workouts_assignments table
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workouts_assignments', function (Blueprint $table) {
            $table->id();
            $table->integer('workout_id');
            $table->integer('user_id');
            $table->date('workout_start_date');
            $table->date('workout_end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workouts_assignments');
    }
};
