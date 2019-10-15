<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipamento;
use App\TipoEquipamento;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipamentos = Equipamento::with('tipo_equipamento')->get();

        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '','titulo' => 'Equipamentos'],
        ];
        
        return view ('equipamento.index', compact('caminhos','equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipamentos_tipos = TipoEquipamento::all();

        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '/home/equipamento','titulo' => 'Equipamentos'],
            ['url' => '','titulo' => 'Cadastrar'],
        ];
        
        return view ('equipamento.adicionar', compact('caminhos','equipamentos_tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Equipamento::create($request->all());
  
        return redirect()->route('equipamento.index');
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
        //
    }
}
