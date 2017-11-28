<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHowDidYouHearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('how_did_you_hears', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Type', 100)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });

        DB::table('how_did_you_hears')->insert([
            [
                'Type' => 'Internet Search'
            ],
            [
                'Type' => 'Driving By'
            ],
            [
                'Type' => 'Newspaper'
            ],
            [
                'Type' => 'Other'
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
        Schema::dropIfExists('how_did_you_hears');
    }
}
