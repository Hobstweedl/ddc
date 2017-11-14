<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name', 100)->nullable();
            $table->dateTime('StartDate')->nullable();
            $table->dateTime('EndDate')->nullable();
            $table->integer('Viewable')->nullable();
            $table->integer('ProrateOnEnrollment')->nullable();
            $table->integer('ChargeForHolidays')->nullable();
            $table->integer('ChargeRegistrationFee')->nullable();
            $table->integer('Order')->nullable();
            $table->integer('Archived')->nullable();
            $table->integer('SeasonType')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('seasons');
    }
}
