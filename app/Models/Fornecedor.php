<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_fantazia',
        'razao_social',
        'cnpj',
        'cpf',
        'nome_contato',
        'email_contato',
        'cel_contato',
        'endereco'
    ];
}
