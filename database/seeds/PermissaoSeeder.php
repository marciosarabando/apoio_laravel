<?php

use Illuminate\Database\Seeder;
use App\Permissao;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios1 = Permissao::firstOrCreate([
            'nome' => 'usuario-view',
            'descricao' => 'Acesso a lista de Usuários'
        ]);

        $usuarios2 = Permissao::firstOrCreate([
            'nome' => 'usuario-create',
            'descricao' => 'Adicionar Usuários'
        ]);

        $usuarios3 = Permissao::firstOrCreate([
            'nome' => 'usuario-edit',
            'descricao' => 'Editar Usuários'
        ]);

        $usuarios4 = Permissao::firstOrCreate([
            'nome' => 'usuario-delete',
            'descricao' => 'Deletar Usuários'
        ]);

        $chamado1 = Permissao::firstOrCreate([
            'nome' => 'chamado-view',
            'descricao' => 'Acesso a lista de Chamados'
        ]);

        $chamado2 = Permissao::firstOrCreate([
            'nome' => 'chamado-create',
            'descricao' => 'Adicionar Chamados'
        ]);

        $chamado3 = Permissao::firstOrCreate([
            'nome' => 'chamado-edit',
            'descricao' => 'Editar Chamados'
        ]);

        $chamado4 = Permissao::firstOrCreate([
            'nome' => 'chamado-delete',
            'descricao' => 'Deletar Chamados'
        ]);
    }
}
