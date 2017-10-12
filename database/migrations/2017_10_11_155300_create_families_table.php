<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->increments('id');
            $table->string('First', 100)->nullable();
            $table->string('Last', 100)->nullable();
            $table->string('Email', 100)->nullable();
            $table->string('Password', 100)->nullable();
            $table->integer('OptOut')->nullable();
            $table->integer('HowDidYouHear')->nullable();
            $table->string('HowDidYouHearDetails', 100)->nullable();
            $table->string('ThirdPartyId', 100)->nullable();
            $table->integer('Active')->nullable();
            $table->integer('paymentmethod_id');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->index(["paymentmethod_id"], 'fk_family_paymentmethod1_idx');

            $table->unique(["id"], 'id_UNIQUE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('families');
    }
}
