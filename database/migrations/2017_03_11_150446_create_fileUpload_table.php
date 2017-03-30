<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileUploadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fileUpload', function (Blueprint $table) {
            $table->increments('id');
            $table->double('data1');
            $table->double('data2');
            $table->double('data3');
            $table->double('data4');
            $table->double('data5');
            $table->double('data6');
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
        Schema::dropIfExists('fileUpload');
    }
}
