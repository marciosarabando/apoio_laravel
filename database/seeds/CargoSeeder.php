<?php

use Illuminate\Database\Seeder;
use App\Cargo;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //O método firstOrCreate - Cria o registro apenas se ele já não tiver sido criado
        $p1 = Cargo::firstOrCreate([
            'nome' => 'Sc',
            'descricao' => 'Servidor Civil'
        ]);

       
        $p1 = Cargo::firstOrCreate([
            'nome' => 'Sd',
            'descricao' => 'Soldado'
        ]);

        $p2 = Cargo::firstOrCreate([
            'nome' => 'Cb',
            'descricao' => 'Cabo'
        ]);

        $p3 = Cargo::firstOrCreate([
            'nome' => 'Sgt',
            'descricao' => 'Sargento'
        ]);

        $p4 = Cargo::firstOrCreate([
            'nome' => 'St',
            'descricao' => 'Sub Tenente'
        ]);

        $p5 = Cargo::firstOrCreate([
            'nome' => 'Asp',
            'descricao' => 'Aspirante'
        ]);

        $p6 = Cargo::firstOrCreate([
            'nome' => '2º Ten',
            'descricao' => '2º Tenente'
        ]);

        $p6 = Cargo::firstOrCreate([
            'nome' => '1º Ten',
            'descricao' => '1º Tenente'
        ]);

        $p3 = Cargo::firstOrCreate([
            'nome' => 'Cap',
            'descricao' => 'Capitão'
        ]);

        $p7 = Cargo::firstOrCreate([
            'nome' => 'Maj',
            'descricao' => 'Major'
        ]);

        $p8 = Cargo::firstOrCreate([
            'nome' => 'Tc',
            'descricao' => 'Tenente-Coronel'
        ]);

        $p9 = Cargo::firstOrCreate([
            'nome' => 'Cel',
            'descricao' => 'Coronel'
        ]);

        $p10 = Cargo::firstOrCreate([
            'nome' => 'Gen Bda',
            'descricao' => 'General de Brigada'
        ]);

        $p11 = Cargo::firstOrCreate([
            'nome' => 'Gen Div',
            'descricao' => 'General de Divisão'
        ]);

        $p12 = Cargo::firstOrCreate([
            'nome' => 'Gen Ex',
            'descricao' => 'General de Exército'
        ]);

        echo "Cargos criados com sucesso";
    }
}
