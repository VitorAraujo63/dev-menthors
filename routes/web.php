<?php

use App\Http\Controllers\AlunoController;
use App\Models\Aluno;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function() {
    return view('login');
});

// Route::get('/dashboard', [AlunoController::class, 'index'])->name('aluno.dashboard');

Route::get('/dashboard', function() {
    $alunos = Aluno::latest()->get();

    return view('dashboard', [
        'alunos' => $alunos
    ]);
})->name('mentores.dashboard');

Route::resource('alunos', AlunoController::class);

Route::get('/alunos/json/{aluno}', [AlunoController::class, 'getAlunoAsJson'])->name('alunos.json');
