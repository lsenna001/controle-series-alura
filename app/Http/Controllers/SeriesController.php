<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());
        session()->flash('mensagem.sucesso', "Série '$serie->nome' criada com sucesso");
        return to_route('series.index');
    }

    public function destroy(Serie $series, Request $request)
    {        
        $series->delete();
        session()->flash('mensagem.sucesso', "Série '$series->nome' removida com sucesso");

        return to_route('series.index');
    }
}
