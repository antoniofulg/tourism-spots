<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouristSpotsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tourist_spots', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('abbreviation');
      $table->foreignId('city_id');
      $table->timestamps();

      $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('tourist_spots');
  }
}
