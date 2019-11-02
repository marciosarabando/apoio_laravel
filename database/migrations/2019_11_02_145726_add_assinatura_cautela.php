<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAssinaturaCautela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cautelas', function (Blueprint $table) {
            $table->longText('assinatura') // Nome da coluna
                    ->nullable() // Preenchimento não obrigatório
                    ->after('obs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cautelas', function (Blueprint $table) {
                $table->dropColumn('assinatura');
        });
    }
}
