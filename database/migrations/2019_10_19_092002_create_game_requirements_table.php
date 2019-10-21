<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_requirements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('game_id');
            $table->string('event_name');
            $table->string('event_type');
            $table->string('player_option');
            $table->integer('dresses')->nullable()->default(null);
            $table->integer('tops')->nullable()->default(null);
            $table->integer('bottoms')->nullable()->default(null);
            $table->integer('shoes')->nullable()->default(null);
            $table->integer('bags')->nullable()->default(null);
            $table->integer('jewellery')->nullable()->default(null);
            $table->integer('accessories')->nullable()->default(null);
            $table->integer('background')->nullable()->default(null);
            $table->integer('hair')->nullable()->default(null);
            $table->integer('props')->nullable()->default(null);
            $table->integer('updated_by')->nullable()->default(null);
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
        Schema::dropIfExists('game_requirements');
    }
}
