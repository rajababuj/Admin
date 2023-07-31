<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('age');
            $table->string('phone');
            $table->text('address');
            $table->string('image') ;
            $table->unsignedBigInteger('membership_id');
            $table->decimal('amount_paid', 8, 2);
            $table->enum('gender', ['1', '2'])->comment('1 for male,2 for female');
            $table->dateTime('in')->nullable();
            $table->dateTime('out')->nullable();
            $table->integer('status')->default(1)->comment('1 for active, 2 for inactive');
            $table->foreign('membership_id')->references('id')->on('memberships')->onDelete('cascade');
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
        Schema::dropIfExists('customers');
    }
}
