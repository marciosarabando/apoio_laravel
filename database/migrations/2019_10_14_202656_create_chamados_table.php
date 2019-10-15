<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->increments('id');
            
            //Campo da Foreign Key
            $table->integer('chamado_tipo_id')->unsigned();
            $table->integer('user_id')->unsigned();

            //Foreign Key
            $table->foreign('chamado_tipo_id')->references('id')->on('chamados_tipos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('solicitacao');
            $table->string('solucao');

            $table->timestamps();

            $table->dateTime('encerrado_em');
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
