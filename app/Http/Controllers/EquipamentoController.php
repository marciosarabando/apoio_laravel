<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipamento;
use App\TipoEquipamento;
use Illuminate\Support\Facades\Auth;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipamentos = Equipamento::with('cautelas')->orderBy('Id','desc')->paginate(5);

        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '','titulo' => 'Equipamentos'],
        ];
        //return $equipamentos;
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

        //validação dos Dados
        $this->validate($request,[
            'equipamento_tipo_id' => 'required|numeric',
            'marca_modelo' => 'required|string|max:255',
            'nr_serie' => 'required|string|max:255|unique:equipamentos',
        ]);


        //Equipamento::create($request->all());
        $equipamento = new Equipamento();
        $equipamento->equipamento_tipo_id = $request->input('equipamento_tipo_id');
        $equipamento->marca_modelo = mb_strtoupper($request->input('marca_modelo'),'UTF-8');
        $equipamento->nr_serie = mb_strtoupper($request->input('nr_serie'),'UTF-8');
        $equipamento->nr_patrimonio = mb_strtoupper($request->input('nr_patrimonio'),'UTF-8');
        $equipamento->obs = mb_strtoupper($request->input('obs'),'UTF-8');
        $equipamento->equipamento_status_id = 1;
        $equipamento->user_id = Auth::user()->id;
  
        if($equipamento->save())
        {
            return redirect()->route('equipamento.index');
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
            ['url' => '/home/equipamento','titulo' => 'Equipamentos'],
            ['url' => '','titulo' => 'Detalhes'],
        ];

        $equipamento = Equipamento::with('cautelas')->find($id);
        return view ('equipamento.show',compact('equipamento','caminhos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipamentos_tipos = TipoEquipamento::all();
        $registro = Equipamento::find($id);

        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '/home/equipamento','titulo' => 'Equipamentos'],
            ['url' => '','titulo' => 'Editar'],
        ];
        return view ('equipamento.editar', compact('registro', 'caminhos', 'equipamentos_tipos'));
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
        Equipamento::find($id)->update($request->all());
        return redirect()->route('equipamento.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Equipamento::find($id)->delete();
        return redirect()->route('equipamento.index');
    }

    public function buscar(Request $request)
    {
        $nr_serie = mb_strtoupper($request->input('buscar_nr_serie'),'UTF-8');
        
        $registro = new Equipamento;
        $registro->nr_serie = $nr_serie;

        $equipamentos = Equipamento::where('nr_serie','LIKE','%'.$nr_serie.'%')->paginate(5);
        
        $caminhos = [
            ['url' => '/home','titulo' => 'Home'],
            ['url' => '/home/equipamento','titulo' => 'Equipamentos'],
        ];
        
        return view ('equipamento.index', compact('caminhos','equipamentos','registro'));

    }


}
