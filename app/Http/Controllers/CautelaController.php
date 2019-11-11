<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cautela;
use App\Equipamento;
use App\Pessoa;
use App\User;
use Illuminate\Support\Facades\Auth;

class CautelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '/home/cautela','titulo' => 'Cautela'],
        ];

        //$cautelas = Cautela::all();
        
        //Busca todas as cautelas que nao possuem data de descautela
        $cautelas = Cautela::where('dt_descautela','=',null)->get();
        //return $cautelas;
        return view ('cautela.index', compact('caminhos','cautelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '/home/cautela','titulo' => 'Cautela'],
            ['url' => '','titulo' => 'Cautelar Equipamento'],
        ];

        $equipamentos = Equipamento::all();

        $pessoas = Pessoa::with('cargo')->orderBy('cargo_id', 'desc')->get();

        return view ('cautela.adicionar',compact('caminhos','equipamentos','pessoas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        date_default_timezone_set('America/Sao_Paulo');
	    $hoje = date('Y-m-d H:i');

        //Verifica se o Equipamento está disponível
        $equipamento = Equipamento::find($request->equipamento_id);

        if($equipamento->equipamento_status_id != 1)
        {
            return 'Atenção: o equipamento selecionado não está disponível para cautela!';
        }


        $cautela = new Cautela();
        $cautela->equipamento_id = $request->input('equipamento_id');
        $cautela->pessoa_id = $request->input('pessoa_id');
        $cautela->dt_cautela = $hoje;
        $cautela->dt_descautela = null;
        $cautela->obs_cautela = $request->input('obs_cautela');
        $cautela->user_id = Auth::user()->id;
        $cautela->user_descautela_id = Auth::user()->id;
        $cautela->assinatura_descautela = null;
        $cautela->obs_descautela = null;

        if($cautela->save())
        {

            $equipamento = Equipamento::find($cautela->equipamento_id);
            $equipamento->equipamento_status_id = 2;
            $equipamento->update();

            $cautela->vinculaEquipamento($equipamento);
            
            $pessoa = Pessoa::with('cargo')->find($cautela->pessoa_id);
            $equipamento = Equipamento::with('equipamento_tipo')->find($cautela->equipamento_id);
            $voltar = 1;

            return view ('cautela.termo',compact('cautela','pessoa','equipamento','voltar'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '/home/cautela','titulo' => 'Cautela'],
            ['url' => '','titulo' => 'Detalhes'],
        ];

        $cautela = Cautela::with('pessoa')->find($id);
        $equipamento = Equipamento::find($cautela->equipamento_id);
        return view ('cautela.show',compact('caminhos','cautela','equipamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Cautela::find($id)->delete();
        return redirect()->route('cautela.index');

    }

    public function abreTermoDescautela($id)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('Y-m-d H:i');

        $cautela = Cautela::with('equipamentos')->find($id);
        $pessoa = Pessoa::with('cargo')->find($cautela->pessoa_id);
        $equipamento = Equipamento::with('equipamento_tipo')->find($cautela->equipamento_id);
        //return $equipamento;
        return view ('cautela.termodescautela',compact('cautela','pessoa','equipamento','hoje'));
    }

    public function descautela($id)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('Y-m-d H:i');
        
        $cautela = Cautela::find($id);
        $cautela->dt_descautela = $hoje;
        //return $cautela;
        $cautela->update();

        $equipamento = Equipamento::find($cautela->equipamento_id);
        $equipamento->equipamento_status_id = 1;
        $equipamento->update();

        return redirect()->route('cautela.index');
    }

    public function exibeFormCautelarEquipamento($equipamento_id)
    {
        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '/home/cautela','titulo' => 'Cautela'],
            ['url' => '','titulo' => 'Cautelar Equipamento'],
        ];

        $equipamentos = Equipamento::all();
        $pessoas = Pessoa::with('cargo')->orderBy('cargo_id', 'desc')->get();
        
        $registro = new Equipamento();
        $registro->equipamento_id = $equipamento_id;

        return view ('cautela.adicionar',compact('caminhos','equipamentos','pessoas','registro'));

    }

    public function geraTermoCautela($id){
       //return $origem;
        $cautela = Cautela::with('equipamentos')->find($id);
        $pessoa = Pessoa::with('cargo')->find($cautela->pessoa_id);
        $equipamento = Equipamento::with('equipamento_tipo')->find($cautela->equipamento_id);
        
        return view ('cautela.termo',compact('cautela','pessoa','equipamento'));
    }

    public function salvarTermo(Request $request, $id){
        $cautela = Cautela::find($id);
        $cautela->assinatura_cautela = $request->assinatura_cautela;
        $cautela->update();
       
        $pessoa = Pessoa::with('cargo')->find($cautela->pessoa_id);
        $equipamento = Equipamento::with('equipamento_tipo')->find($cautela->equipamento_id);
        $voltar = 1;

        return view ('cautela.termo',compact('cautela','pessoa','equipamento','voltar'));
    }

    public function salvarTermoDescautela(Request $request, $id)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('Y-m-d H:i');

        $cautela = Cautela::find($id);
        $cautela->assinatura_descautela = $request->assinatura_descautela;
        $cautela->dt_descautela = $hoje;
        $cautela->update();

        $equipamento = Equipamento::find($cautela->equipamento_id);
        $equipamento->equipamento_status_id = 1;
        $equipamento->update();

        return redirect()->route('cautela.index');
    }

    public function buscarPorNome(Request $request)
    {
        $nome = mb_strtoupper($request->input('buscar_nome'),'UTF-8');
        
        $pessoas = Pessoa::where('nome','LIKE','%'.$nome.'%')->get();
        
        $registro = new Pessoa;
        $registro->nome = $nome;
        //return $registro;
        $x = 0;
        
        $ids_pessoas[0] = 0;

        foreach($pessoas as $umapessoa)
        {
            $ids_pessoas[$x] = $umapessoa->id;
            //$ids_pessoas .= ",";
            $x++;
        }

        //$ids_pessoas = "1, 2";
        //return $ids_pessoas;

        $cautelas = Cautela::whereIn('pessoa_id', $ids_pessoas)->paginate(5);
        
        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '/home/cautela','titulo' => 'Cautela'],
        ];
        
        return view ('cautela.index', compact('caminhos','cautelas','registro'));
    }
}
