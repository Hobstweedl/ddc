<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('addressable_id')->nullable();
            $table->string('addressable_type', 200)->nullable();
            $table->integer('addresstype_id');
            $table->string('Address1', 100)->nullable();
            $table->string('Address2', 100)->nullable();
            $table->string('Address3', 100)->nullable();
            $table->string('City', 100)->nullable();
            $table->string('State', 2)->nullable();
            $table->string('Zip', 10)->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
