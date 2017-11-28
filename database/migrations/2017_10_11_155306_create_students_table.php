<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id');
            $table->string('First', 100)->nullable();
            $table->string('Last', 100)->nullable();
            $table->dateTime('Birthday')->nullable();
            $table->integer('Sex')->nullable();
            $table->string('MedicalConditions', 200)->nullable();
            $table->string('Comments', 200)->nullable();
            $table->integer('PaperWaiver')->nullable();
            $table->dateTime('OnlineWaiverAccepted')->nullable();
            $table->integer('Performing')->nullable();
            $table->string('ThirdPartyId')->nullable();
            $table->unsignedInteger('Active')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->unique(["id"], 'id_UNIQUE');
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
        Schema::dropIfExists('students');
    }
}
