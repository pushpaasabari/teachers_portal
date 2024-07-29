<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_basic', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('email', 120);
            $table->string('pwd', 120);
            $table->string('name', 120);
            $table->string('last_logged_in', 120);
            $table->integer('status');
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
        Schema::drop('teachers_basic');
    }
};
