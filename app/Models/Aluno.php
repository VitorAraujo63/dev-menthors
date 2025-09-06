<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'password',
        'grupo',
        'telefone',
        'nome_responsavel',
        'tel_responsavel',
        'data_nascimento'
    ];


    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
