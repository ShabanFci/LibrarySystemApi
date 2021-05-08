<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('auther_id')->unsigned()->index(); 
            $table->foreign('auther_id')->references('id')->on('authers')->onDelete('cascade'); 
            $table->bigInteger('category_id')->unsigned()->index(); 
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('isbn', 100);
            $table->string('title', 100);
            $table->string('date_of_publication', 100);
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
        Schema::dropIfExists('books');
    }
}
