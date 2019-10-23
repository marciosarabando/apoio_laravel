<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cautela;
use App\Equipamento;
use App\Pessoa;

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
            ['url' => '','titulo' => 'Cautela'],
        ];

        //$cautelas = Cautela::all();
        
        //Busca todas as cautelas que nao possuem data de descautela
        $cautelas = Cautela::where('dt_descautela','=',null)->get();

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

        //Buscar a última cautela do Equipamento para saber se está com data de descautela = null
        $equipamentos = Equipamento::with('cautelas')->get();

        //$equipamentos = Equipamento::with('cautelas')->where('cautela', '=', 'null')->get();

        //return $equipamentos;

        $pessoas = Pessoa::all();

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

        //Cautela::create($request->all());
        $cautela = new Cautela();
        $cautela->equipamento_id = $request->input('equipamento_id');
        $cautela->pessoa_id = $request->input('pessoa_id');
        $cautela->dt_cautela = $hoje;
        $cautela->dt_descautela = null;
        $cautela->obs = $request->input('obs');

        

        if($cautela->save())
        {

            $equipamento = Equipamento::find($cautela->equipamento_id);

            $cautela->vinculaEquipamento($equipamento);
            
            //return $cautela;
            
            //return redirect('produtos/create')->with('success','Produto Cadastrado com Sucesso!!!');
            return redirect()->route('cautela.index');
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
        //
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

    public function descautela($id)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $hoje = date('Y-m-d H:i');
        
        $cautela = Cautela::find($id);
       
        $cautela->dt_descautela = $hoje;

        //return $cautela;
        $cautela->update();

        return redirect()->route('cautela.index');
    }
}
