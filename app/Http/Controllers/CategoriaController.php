<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate(['nome' => 'required',
     'imagem' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048']);
        
    $caminhoImagem = null;

    if ($request->hasFile('imagem')) {
        $imagem = $request->file('imagem');

        if ($imagem->isValid()) {
            $nomeImagem = time() . '_' . $imagem->getClientOriginalName();
            $imagem->move(public_path('img'), $nomeImagem);
            $caminhoImagem = 'img/' . $nomeImagem;
        }
    }

        Categoria::create([
        'nome' => $request->nome,
        'imagem' => $caminhoImagem,
    ]);
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        // crie uma página cuja finalidade é apenas
        // exibir todos os dados da categoria...
        // idem para qualquer outro model
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'imagem' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $dados = ['nome' => $request->nome];

    if ($request->hasFile('imagem')) {
        $imagem = $request->file('imagem');

        if ($imagem->isValid()) {
            $nomeImagem = time() . '_' . $imagem->getClientOriginalName();

            $imagem->move(public_path('img'), $nomeImagem);

            $dados['imagem'] = 'img/' . $nomeImagem;
        }
    }

    $categoria->update($dados);

    return redirect()->route('categorias.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
