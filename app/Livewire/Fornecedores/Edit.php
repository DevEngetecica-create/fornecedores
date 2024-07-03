<?php

namespace App\Http\Livewire\Fornecedores;

use Livewire\Component;
use App\Models\Fornecedor;

class Edit extends Component
{
    public $fornecedor;
    public $nome_fantazia;
    public $razao_social;
    public $cnpj;
    public $cpf;
    public $nome_contato;
    public $email_contato;
    public $cel_contato;
    public $endereco;

    public function mount($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $this->fornecedor = $fornecedor;
        $this->nome_fantazia = $fornecedor->nome_fantazia;
        $this->razao_social = $fornecedor->razao_social;
        $this->cnpj = $fornecedor->cnpj;
        $this->cpf = $fornecedor->cpf;
        $this->nome_contato = $fornecedor->nome_contato;
        $this->email_contato = $fornecedor->email_contato;
        $this->cel_contato = $fornecedor->cel_contato;
        $this->endereco = $fornecedor->endereco;
    }

    protected $rules = [
        'nome_fantazia' => 'required|string|max:255',
        'razao_social' => 'required|string|max:255',
        'cnpj' => 'nullable|string|max:18',
        'cpf' => 'nullable|string|max:14',
        'nome_contato' => 'required|string|max:255',
        'email_contato' => 'required|email|max:255',
        'cel_contato' => 'required|string|max:20',
        'endereco' => 'required|string|max:255',
    ];

    public function submit()
    {
        $this->validate();

        $this->fornecedor->update([
            'nome_fantazia' => $this->nome_fantazia,
            'razao_social' => $this->razao_social,
            'cnpj' => $this->cnpj,
            'cpf' => $this->cpf,
            'nome_contato' => $this->nome_contato,
            'email_contato' => $this->email_contato,
            'cel_contato' => $this->cel_contato,
            'endereco' => $this->endereco,
        ]);

        return redirect()->route('fornecedores.index');
    }

    public function render()
    {
        return view('livewire.fornecedores.edit');
    }
}
