<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChamadosAndamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chamados_andamento', function (Blueprint $table) {
            $table->increments('id');
            
            //Campo da Foreign Key
            $table->integer('chamado_id')->unsigned();
            $table->integer('chamado_status_id')->unsigned();
            $table->integer('atendente_user_id')->unsigned();

            //Foreign Key
            $table->foreign('chamado_id')->references('id')->on('chamados')->onDelete('cascade');
            $table->foreign('chamado_status_id')->references('id')->on('chamados_status')->onDelete('cascade');
            $table->foreign('atendente_user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('chamados_andamento');
    }
}
