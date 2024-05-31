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

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '$serie->nome' criada com sucesso");
    }

    public function destroy(Serie $series)
    {        
        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '$series->nome' removida com sucesso");
    }

    public function edit(Serie $series)
    {
        return view("series.edit")->with('series', $series);
    }

    public function update(Serie $series, Request $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '$series->nome' atualizada com sucesso");
    }
}
