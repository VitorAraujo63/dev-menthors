<?php

namespace App\Http\Controllers;

use App\Models\Mentores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class MentoresController extends Controller
{
    public function index(Mentores $mentores)
    {
        $mentor = Mentores::find($mentores);

        if (!$mentor) {
            return response()->json(['error' => 'Mentor não encontrado.'], 404);
        }
        return response()->json($mentor);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nome' => 'required|string|max:155',
            'email' => 'required|email|unique:mentores,email',
            'password' => 'required|string|min:8|confirmed',
            'funcao' => 'nullable|string|max:255'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        $validate['status'] = 'ativo';

        Mentores::create($validate);

        return redirect()->back()->with('success', 'Mentor cadastrado com sucesso!');
    }

    public function toggleStatus(Mentores $mentor)
    {
         if (strtolower($mentor->status) === 'ativo') {
        $mentor->status = 'Inativo';
        } else {
            $mentor->status = 'Ativo';
        }

        $mentor->save();

        return redirect()->back()->with('success', 'Alterado o status do mentor!');
    }

    public function show(Mentores $mentor)
    {

    }

    public function update(Request $request, Mentores $mentore)
    {

        $validate = $request->validate([
            'nome' => 'required|string|max:155',
            'email' => [
                'required',
                'email',
            Rule::unique('mentores')->ignore($mentore->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
            'funcao' => 'required|string|max:255'
        ]);

        if (!empty($validate['password'])) {
            $validate['password'] = Hash::make($validate['password']);
        } else {
            unset($validate['password']);
        }

        $mentore->update($validate);

        return redirect()->back()->with('success', 'Mentor atualizado com sucesso!');
    }

    public function destroy(Mentores $mentore)
    {
        $mentore->delete();
        return redirect()->back()->with('success', 'Mentor removido com sucesso!');
    }
}
