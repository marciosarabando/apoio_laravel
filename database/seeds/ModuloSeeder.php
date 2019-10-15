<?php

use Illuminate\Database\Seeder;
use App\Modulo;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = Modulo::firstOrCreate([
            'nome' => 'Chamados',
            'descricao' => 'Módulo de Controle de Chamados de Informática'
        ]);

        $p2 = Modulo::firstOrCreate([
            'nome' => 'Equipamentos',
            'descricao' => 'Módulo de Controle de Equipamentos de Informática'
        ]);

        echo "Modulos criados com sucesso";
    }
}
