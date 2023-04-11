<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->string('account_id');
            $table->unsignedBigInteger('ebook_id');
            $table->date('order_date');
            $table->timestamps();

            $table->foreign('account_id')->references('account_id')->on('account')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ebook_id')->references('ebook_id')->on('ebook')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
