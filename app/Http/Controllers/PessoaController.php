<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use App\Cargo;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::with('cargo')->orderBy('cargo_id', 'desc')->paginate(5);

        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '','titulo' => 'Pessoas'],
        ];
        
        return view ('pessoa.index', compact('caminhos','pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::all();

        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '/home/pessoa','titulo' => 'Pessoas'],
            ['url' => '','titulo' => 'Cadastrar'],
        ];
        
        return view ('pessoa.adicionar', compact('caminhos','cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Pessoa::create($request->all());

        $pessoa = new Pessoa();
        $pessoa->cargo_id = mb_strtoupper($request->input('cargo_id'),'UTF-8');
        $pessoa->nome = mb_strtoupper($request->input('nome'),'UTF-8');
        $pessoa->secao = mb_strtoupper($request->input('secao'),'UTF-8');
        $pessoa->obs = mb_strtoupper($request->input('obs'),'UTF-8');

        if($pessoa->save())
        {
            return redirect()->route('pessoa.index')->with('success','Pessoa Cadastrada com Sucesso!!!');
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
        $cargos = Cargo::all();
        $registro = Pessoa::find($id);

        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '/home/pessoa','titulo' => 'Pessoas'],
            ['url' => '','titulo' => 'Editar'],
        ];
        return view ('pessoa.editar', compact('registro', 'caminhos', 'cargos'));
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
        Pessoa::find($id)->update($request->all());
        return redirect()->route('pessoa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pessoa::find($id)->delete();
        return redirect()->route('pessoa.index');
    }
}
