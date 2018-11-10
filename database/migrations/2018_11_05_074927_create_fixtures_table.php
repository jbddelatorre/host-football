<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tournament_subcategory_id')->unsigned();
            $table->integer('a_team')->unsigned();
            $table->integer('b_team')->unsigned();
            $table->integer('a_score')->unsigned();
            $table->integer('b_score')->unsigned();
            $table->integer('match_order')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('fixture_type_id')->unsigned();
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
        Schema::dropIfExists('fixtures');
    }
}
