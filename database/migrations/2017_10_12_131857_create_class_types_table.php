<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name', 100)->nullable();
            $table->integer('ProrateOnEnrollment')->nullable();
            $table->integer('ChargeRegistrationFee')->nullable();
            $table->integer('rate_group_id');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });

        DB::table('class_types')->insert([
            [
                'Name' => 'Ballet',
                'ProrateOnEnrollment' => '2',
                'ChargeRegistrationFee' => '1',
                'rate_group_id' => '1'
            ],
            [
                'Name' => 'Jazz',
                'ProrateOnEnrollment' => '2',
                'ChargeRegistrationFee' => '1',
                'rate_group_id' => '1'
            ],
            [
                'Name' => 'Modern',
                'ProrateOnEnrollment' => '2',
                'ChargeRegistrationFee' => '1',
                'rate_group_id' => '1'
            ],
            [
                'Name' => 'Tap',
                'ProrateOnEnrollment' => '2',
                'ChargeRegistrationFee' => '1',
                'rate_group_id' => '1'
            ],
            [
                'Name' => 'Lyrical',
                'ProrateOnEnrollment' => '2',
                'ChargeRegistrationFee' => '1',
                'rate_group_id' => '1'

            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_types');
    }
}
