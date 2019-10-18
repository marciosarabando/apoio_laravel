<?php

use Illuminate\Database\Seeder;
use App\TipoEquipamento;

class EquipamentoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $p1 = TipoEquipamento::firstOrCreate([
            'nome' => 'DESKTOP',
            'descricao' => 'DESKTOP'
        ]);

        $p1 = TipoEquipamento::firstOrCreate([
            'nome' => 'NOTEBOOK',
            'descricao' => 'NOTEBOOK'
        ]);

    }
}
