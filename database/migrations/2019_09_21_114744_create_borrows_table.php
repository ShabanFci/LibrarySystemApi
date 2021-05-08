<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('book_id')->unsigned()->index(); 
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->index(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('date_issued', 100);
            $table->string('date_due_for_return', 100);
            $table->string('date_return', 100)->nullable();
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
        Schema::dropIfExists('borrows');
    }
}
