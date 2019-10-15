<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            //O campo Nullable significa, não obrigatório
            $table->string('descricao')->nullable();
            $table->timestamps();
        });

        //Tabela de Relacionamento Perfil com Permissoes
        //Seguir o padrão de nomenclatura e ordem alfabética
        //Ex. perf e depois perm = perfis_permissoes
        //Usar/Respeitar o Nome do Modelo
        Schema::create('perfil_permissao', function (Blueprint $table) {
            $table->integer('permissao_id')->unsigned();
            $table->integer('perfil_id')->unsigned();
         
            //Foreign Keys
            $table->foreign('permissao_id')->references('id')->on('permissoes')->onDelete('cascade');
            $table->foreign('perfil_id')->references('id')->on('perfis')->onDelete('cascade');
            
            //Key - Chave Primária
            $table->primary(['permissao_id','perfil_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfil_permissao');
        Schema::dropIfExists('perfis');
    }
}
