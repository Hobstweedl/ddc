<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name', 100)->nullable();
            $table->integer('season_id');
            $table->string('HeldOn', 100)->nullable();
            $table->dateTime('StartTime')->nullable();
            $table->integer('Length')->nullable();
            $table->integer('instructor_id');
            $table->string('classcol', 45)->nullable();
            $table->integer('classtype_id');
            $table->string('PublicDescription', 100)->nullable();
            $table->string('PrivateNotes', 100)->nullable();
            $table->integer('MaxSize')->nullable();
            $table->integer('location_id');
            $table->integer('AgeFrom')->nullable();
            $table->integer('AgeTo')->nullable();
            $table->integer('AgeNAFlag')->nullable();
            $table->integer('Prerequisite')->nullable();
            $table->string('PrerequsiteNote', 100)->nullable();
            $table->integer('OnlineRegistrationAllowed')->nullable();
            $table->string('Password', 100)->nullable();
            $table->decimal('ClassCharge', 10, 2)->nullable();
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
        Schema::dropIfExists('classes');
    }
}
