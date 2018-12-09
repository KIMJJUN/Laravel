<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('board_id')->nullable()->unsigned()->index();
            $table->string('filename', 50);
            $table->integer('bytes')->nullable()->unsigned();
            $table->string('mime')->nullable();
            //nullable : 널값을 넣을 수 있다고 반드시 지정해 줘야 함.
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
        Schema::dropIfExists('attachments');
    }
}
