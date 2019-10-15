<?php

use Illuminate\Database\Seeder;
use App\StatusChamado;

class StatusChamadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = StatusChamado::firstOrCreate([
            'descricao' => 'ABERTO'
        ]);

        $p1 = StatusChamado::firstOrCreate([
            'descricao' => 'EM ATENDIMENTO'
        ]);

        $p1 = StatusChamado::firstOrCreate([
            'descricao' => 'ENCERRADO'
        ]);

        echo "Status de Chamados criados com sucesso";
    }
}
