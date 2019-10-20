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

        //Tabela de Relacionamento Cautelas com Equipamentos
        //Seguir o padrão de nomenclatura e ordem alfabética
        //Ex. perf e depois perm = perfis_permissoes
        //Usar/Respeitar o Nome do Modelo
        Schema::create('cautela_equipamento', function (Blueprint $table) {
            $table->integer('cautela_id')->unsigned();
            $table->integer('equipamento_id')->unsigned();
        
            //Foreign Keys
            $table->foreign('cautela_id')->references('id')->on('cautelas')->onDelete('cascade');
            $table->foreign('equipamento_id')->references('id')->on('equipamentos')->onDelete('cascade');
            
            //Key - Chave Primária
            $table->primary(['cautela_id','equipamento_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cautela_equipamento');
        Schema::dropIfExists('cautelas');
    }
}
