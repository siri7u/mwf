<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emplacement_id')->index();
            $table->string('name', 100);
            $table->mediumText('description');
            $table->timestamps();

            $table->foreign('emplacement_id')->references('id')->on('emplacements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('choses');
    }
}
