<?php

namespace App\Livewire\Fornecedores;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Fornecedor;

class Index extends Component
{
    use WithPagination;

    public $search = ''; // Propriedade para armazenar o termo de pesquisa

    protected $paginationTheme = 'bootstrap'; // Usar o tema Bootstrap para a paginação

    public function updatingSearch()   {
      

        $this->resetPage();
    }

    public function render()
    {
        

        $fornecedores = Fornecedor::where('nome_fantazia', 'like', '%' . $this->search . '%')
                                  ->orWhere('razao_social', 'like', '%' . $this->search . '%')
                                  ->paginate(10);

        return view('livewire.fornecedores.index', ['fornecedores' => $fornecedores]);
    }

    public function delete($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();

        // Prepare notification message
        $notification = [
            'notification' => [
                'title' => "Atenção!!!",
                'message' => 'Fornecedor deletado com sucesso.',
                'type' => 'success'
            ]
        ];

        return redirect()->route('fornecedores.index')->with($notification);
    }
}
