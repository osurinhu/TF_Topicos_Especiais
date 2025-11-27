<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    // LISTAR TODAS AS CATEGORIAS
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    // FORMULÁRIO DE CRIAÇÃO
    public function create()
    {
        return view('categorias.create');
    }

    // SALVAR NOVA CATEGORIA
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|max:255',
        ]);

        Categoria::create([
            'nome' => $request->input('nome')
        ]);

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoria criada com sucesso!');
    }

    // MOSTRAR DETALHES
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('categorias.show', compact('categoria'));
    }

    // FORMULÁRIO DE EDIÇÃO
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);

        return view('categorias.edit', compact('categoria'));
    }

    // ATUALIZAR CATEGORIA
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|max:255',
        ]);

        $categoria = Categoria::findOrFail($id);

        $categoria->update([
            'nome' => $request->input('nome')
        ]);

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoria atualizada com sucesso!');
    }

    // DELETAR CATEGORIA
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoria deletada com sucesso!');
    }
}
