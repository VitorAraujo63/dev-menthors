<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{

    public function index()
    {
        $alunos = Aluno::latest()->paginate(10);

        return view('dashboard', compact('alunos'));

    }

    public function getAlunoAsJson(Aluno $aluno)
    {
        return response()->json($aluno);
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {


        $validate = $request->validate([
            'nome' => 'required|string|max:155',
            'email' => 'required|email|unique:alunos,email',
            'password' => 'required|string|min:8|confirmed',
            'grupo' => 'nullable|string',
            'telefone' => 'required|string',
            'nome_responsavel' => 'nullable|string',
            'tel_responsavel' => 'nullable|required_with:nome_responsavel|string|digits_between:10,11',
            'data_nascimento' => 'nullable|date|before:today'
        ]);

        $validate['password'] = Hash::make($validate['password']);
        Aluno::create($validate);

        return redirect()->back()->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, Aluno $aluno)
    {
        $validate = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:alunos,email,' . $aluno->id,
            'password' => 'nullable|string|min:8|confirmed',
            'grupo' => 'nullable|string',
            'telefone' => 'required|string|max:15',
            'nome_responsavel' => 'nullable|string',
            'tel_responsavel' => 'nullable|string|max:15',
            'data_nascimento' => 'nullable|date|before:today',
        ]);

        if (!empty($validate['password'])) {
            $validate['password'] = Hash::make($validate['password']);
        } else {
            unset($validate['password']);
        }

        $aluno->update($validate);

        return redirect()->back()->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->back()->with('success', 'Aluno removido com sucesso!');
    }
}
