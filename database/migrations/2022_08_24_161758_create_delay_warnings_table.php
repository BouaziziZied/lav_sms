<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelayWarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delay_warnings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('section')->nullable();
            $table->string('day')->nullable();
            $table->string('date')->nullable();
            $table->string('hour')->nullable();
            $table->string('student_signature')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('parent_statement')->nullable();
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
        Schema::dropIfExists('delay_warnings');
    }
}
