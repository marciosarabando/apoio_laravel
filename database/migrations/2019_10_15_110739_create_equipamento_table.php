<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos_tipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');

            //O campo Nullable significa, não obrigatório
            $table->string('descricao')->nullable();
            
            $table->timestamps();
        });

        Schema::create('equipamentos_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
            
            $table->timestamps();
        });

        Schema::create('equipamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipamento_tipo_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('marca_modelo');
            $table->string('nr_serie')->unique();
            $table->string('obs')->nullable();
            $table->integer('equipamento_status_id')->unsigned();
            

            $table->timestamps();

            $table->foreign('equipamento_tipo_id')->references('id')->on('equipamentos_tipos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('equipamento_status_id')->references('id')->on('equipamentos_status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamentos');
        Schema::dropIfExists('equipamentos_tipos');
        Schema::dropIfExists('equipamentos_status');
    }
}
