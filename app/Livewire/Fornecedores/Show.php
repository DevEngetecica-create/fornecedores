<?php

namespace App\Http\Livewire\Fornecedores;

use Livewire\Component;
use App\Models\Fornecedor;

class Show extends Component
{
    public $fornecedor;

    public function mount($id)
    {
        $this->fornecedor = Fornecedor::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.fornecedores.show');
    }
}
