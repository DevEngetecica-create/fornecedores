<?php

namespace App\Livewire\Fornecedores;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Fornecedor;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap'; // Usar o tema Bootstrap para a paginação

    public function render()
    {
        $fornecedores = Fornecedor::orderBy('id', 'desc')->paginate(8); // Ajuste o número de itens por página conforme necessário

        return view('livewire.fornecedores.index', [
            'fornecedores' => $fornecedores,
        ]);
    }
}