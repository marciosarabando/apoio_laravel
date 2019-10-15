<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCautelaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cautelas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipamento_id')->unsigned();
            $table->integer('pessoa_id')->unsigned();

            $table->dateTime('dt_cautela');
            $table->dateTime('dt_descautela')->nullable();

            $table->string('obs')->nullable();

            $table->timestamps();

            $table->foreign('equipamento_id')->references('id')->on('equipamentos')->onDelete('cascade');
            $table->foreign('pessoa_id')->references('id')->on('pessoas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
