<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    // LISTAR
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    // FORMULÁRIO DE CRIAÇÃO
    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    // SALVAR
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'categoria' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        // Upload
        $caminho = null;
        if ($request->hasFile('imagem')) {
            $caminho = $request->file('imagem')->store('produtos', 'public');
        }

        Produto::create([
            'nome' => $request->nome,
            'categoria_id' => $request->categoria,
            'imagem' => $caminho
        ]);

        return redirect()->route('produtos.index');
    }


    // MOSTRAR DETALHES
    public function show($id)
    {
        $produto = Produto::findOrFail($id);

        Cookie::queue('ultimo_produto', $produto->id, 1440);
        return view('produtos.show', compact('produto'));
    }


    // FORMULÁRIO DE EDIÇÃO
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();

        return view('produtos.edit', compact('produto', 'categorias'));
    }

    // ATUALIZAR
   public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        // Validação
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'categoria' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload da nova imagem (se enviada)
        if ($request->hasFile('imagem')) {

            // Apagar imagem antiga se existir
            if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
                Storage::disk('public')->delete($produto->imagem);
            }

            // Salvar nova imagem
            $novoCaminho = $request->file('imagem')->store('produtos', 'public');
            $produto->imagem = $novoCaminho;
        }

        // Atualizar demais campos
        $produto->nome = $request->nome;
        $produto->categoria_id = $request->categoria;

        $produto->save();

        return redirect()->route('produtos.show', $produto->id)
                        ->with('success', 'Produto atualizado com sucesso!');
    }

    // DELETAR
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        // Apagar imagem se existir
        if ($produto->imagem && Storage::disk('public')->exists($produto->imagem)) {
            Storage::disk('public')->delete($produto->imagem);
        }

        // Apagar registro do banco
        $produto->delete();

        return redirect()->route('produtos.index')
                        ->with('success', 'Produto deletado com sucesso!');
    }
}
