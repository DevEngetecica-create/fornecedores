<?php

namespace App\Livewire\Fornecedores;

use Livewire\Component;
use App\Models\Fornecedor;

class Create extends Component
{
    public $nome_fantazia;
    public $razao_social;
    public $cnpj;
    public $cpf;
    public $nome_contato;
    public $email_contato;
    public $cel_contato;
    public $endereco;

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

        Fornecedor::create([
            'nome_fantazia' => $this->nome_fantazia,
            'razao_social' => $this->razao_social,
            'cnpj' => $this->cnpj,
            'cpf' => $this->cpf,
            'nome_contato' => $this->nome_contato,
            'email_contato' => $this->email_contato,
            'cel_contato' => $this->cel_contato,
            'endereco' => $this->endereco,
        ]);
        
        // Prepare notification message
        $notification = [
            'notification' => [
                'title' => "Atenção!!!",
                'message' => 'Fornecedor cadastrado com sucesso.',
                'type' => 'success'
            ]
        ];

        return redirect()->route('fornecedores.index')->with($notification);
    }

    public function render()
    {
        return view('livewire.fornecedores.create');
    }
}
