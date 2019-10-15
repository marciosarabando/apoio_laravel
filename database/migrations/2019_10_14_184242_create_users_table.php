<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('cargo_id')->unsigned();
            $table->integer('perfil_id')->unsigned();
            $table->integer('secao_id')->unsigned();
            
            $table->string('login')->unique();
            $table->string('nm_guerra');
            $table->string('password');
            
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
            $table->foreign('perfil_id')->references('id')->on('perfis')->onDelete('cascade');
            $table->foreign('secao_id')->references('id')->on('secoes')->onDelete('cascade');


           
        });

        //Tabela de Relacionamento Usuarios com Modulos
        //Seguir o padrão de nomenclatura e ordem alfabética
        //Ex. perf e depois perm = perfis_permissoes
        //Usar/Respeitar o Nome do Modelo
        Schema::create('modulo_user', function (Blueprint $table) {
            $table->integer('modulo_id')->unsigned();
            $table->integer('user_id')->unsigned();
        
            //Foreign Keys
            $table->foreign('modulo_id')->references('id')->on('modulos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            //Key - Chave Primária
            $table->primary(['modulo_id','user_id']);
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
