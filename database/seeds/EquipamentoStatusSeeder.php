<?php

use Illuminate\Database\Seeder;
use App\EquipamentoStatus;

class EquipamentoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = EquipamentoStatus::firstOrCreate([
            'descricao' => 'DISPONÍVEL'
        ]);

        $p1 = EquipamentoStatus::firstOrCreate([
            'descricao' => 'CAUTELADO'
        ]);

        $p1 = EquipamentoStatus::firstOrCreate([
            'descricao' => 'BAIXADO'
        ]);

        $p1 = EquipamentoStatus::firstOrCreate([
            'descricao' => 'DESCARREGADO'
        ]);

        echo "Status de Equipamentos criados com sucesso";
    }
}
