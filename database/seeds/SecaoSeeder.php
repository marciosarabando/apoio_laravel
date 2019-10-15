<?php

use Illuminate\Database\Seeder;
use App\Secao;

class SecaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //O método firstOrCreate - Cria o registro apenas se ele já não tiver sido criado
        $p1 = Secao::firstOrCreate([
            'nome' => 'SFPC2.00 - 2ª RM',
            'descricao' => 'SFPC do Comando da 2ª Região Militar'
        ]);

        echo "Secoes criados com sucesso";
    }
}
