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
        Schema::create('lives', function (Blueprint $table) {
            $table->id();
            $table->string('synopsis');
            $table->text('summary');
            $table->text('frame_url');
            $table->integer('id_time_one');
            $table->integer('id_time_two');
            $table->integer('id_resp');
            $table->integer('id_championships');
            $table->integer('ticket');
            $table->integer('visitors');
            $table->integer('status');
            $table->date('data_e');
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
        Schema::dropIfExists('lives');
    }
};
