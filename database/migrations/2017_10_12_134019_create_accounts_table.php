<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id');
            $table->integer('student_id');
            $table->dateTime('Date')->nullable();
            $table->string('Description', 200)->nullable();
            $table->integer('enrollment_id');
            $table->decimal('Charge', 10, 2)->nullable();
            $table->decimal('Payment', 10, 2)->nullable();
            $table->integer('PaymentMethod')->nullable();
            $table->integer('PaymentTowards')->nullable();
            $table->string('Notes', 200)->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
