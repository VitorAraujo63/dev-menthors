<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mentores extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'password',
        'funcao',
        'status'
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
