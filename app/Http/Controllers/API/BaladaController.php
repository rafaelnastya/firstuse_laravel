<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balada;
use Illuminate\Support\Facades\Validator;

class BaladaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dadosBalada = Balada::all();
        $contador = $dadosBalada->count();
        return 'Baladas contadas: ' . $contador .' - '. $dadosBalada;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosBalada = $request -> all();
        $validador = Validator::make($dadosBalada,[
            'nomeBalada' => 'required',
            'localBalada' => 'required'
        ]);

        if($validador->fails()){
            return 'REGISTROS INVÁLIDOS!'. $validador->error(true). 500;
        }
        
        $registrosBalada = Balada::create($dadosBalada);

        if($registrosBalada){
            return 'Registros cadastrados com sucesso' . $registrosBalada . 201;
        }
        else{
            return 'Erro ao cadastrar baladas' . 500;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
