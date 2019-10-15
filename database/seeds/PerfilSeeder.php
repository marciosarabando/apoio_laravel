<?php

use Illuminate\Database\Seeder;
use App\Perfil;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = Perfil::firstOrCreate([
            'nome' => 'Admin',
            'descricao' => 'Administrador do Sistema'
        ]);

        $p2 = Perfil::firstOrCreate([
            'nome' => 'Usuário',
            'descricao' => 'Usuário do Sistema'
        ]);

        echo "Perfis criados com sucesso";
    }
}
