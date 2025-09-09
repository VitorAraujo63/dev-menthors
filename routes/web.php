<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\MentoresController;
use App\Models\Aluno;
use App\Models\Mentores;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function() {
    return view('login');
});

Route::get('/dashboard', function() {
    $alunos = Aluno::latest()->get();
    $mentores = Mentores::latest()->get();

    return view('dashboard', [
        'alunos' => $alunos,
        'mentores' => $mentores
    ]);
})->name('mentores.dashboard');

Route::get('/alunos/json/{aluno}', [AlunoController::class, 'index'])->name('alunos.json');
Route::resource('alunos', AlunoController::class);

Route::get('/mentores/json/{mentores}', [MentoresController::class, 'index'])->name('mentores.json');
Route::patch('/mentores/{mentor}/status', [MentoresController::class, 'toggleStatus'])->name('mentores.status');
Route::resource('mentores', MentoresController::class);
