<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rate_group');
            $table->decimal('HoursPerWeek', 10, 2)->nullable();
            $table->decimal('DollarsPerWeek', 10, 2)->nullable();
            $table->boolean('MaxChargeForRateGroup')->nullable();
            $table->timestamps();
        });

        DB::table('rates')->insert([
            [
                'rate_group' => '1',
                'HoursPerWeek' => '1',
                'DollarsPerWeek' => '50',
                'MaxChargeForRateGroup' => '0'
            ],
            [
                'rate_group' => '1',
                'HoursPerWeek' => '2',
                'DollarsPerWeek' => '95',
                'MaxChargeForRateGroup' => '0'
            ],
            [
                'rate_group' => '1',
                'HoursPerWeek' => '3',
                'DollarsPerWeek' => '135',
                'MaxChargeForRateGroup' => '0'
            ],
            [
                'rate_group' => '1',
                'HoursPerWeek' => '4',
                'DollarsPerWeek' => '170',
                'MaxChargeForRateGroup' => '0'
            ],
            [
                'rate_group' => '1',
                'HoursPerWeek' => '5',
                'DollarsPerWeek' => '200',
                'MaxChargeForRateGroup' => '1'

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
        Schema::dropIfExists('rates');
    }
}
