<?php

namespace App\Livewire\Fornecedores;

use Livewire\Component;
use App\Models\Fornecedor;

class Index extends Component
{
    public $fornecedores;

    public function mount()
    {
        $this->fornecedores = Fornecedor::all();
    }

    public function render()
    {
        return view('livewire.fornecedores.index');
    }
}