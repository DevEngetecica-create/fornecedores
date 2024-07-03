<div>
    <h2>Listar Fornecedores</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nome Fantasia</th>
                <th>Razão Social</th>
                <th>CNPJ</th>
                <th>CPF</th>
                <th>Nome Contato</th>
                <th>Email Contato</th>
                <th>Celular Contato</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fornecedores as $fornecedor)
            <tr>
                <td>{{ $fornecedor->nome_fantazia }}</td>
                <td>{{ $fornecedor->razao_social }}</td>
                <td>{{ $fornecedor->cnpj }}</td>
                <td>{{ $fornecedor->cpf }}</td>
                <td>{{ $fornecedor->nome_contato }}</td>
                <td>{{ $fornecedor->email_contato }}</td>
                <td>{{ $fornecedor->cel_contato }}</td>
                <td>{{ $fornecedor->endereco }}</td>
                <td>
                    <a href="{{ route('fornecedores.show', $fornecedor->id) }}" class="btn btn-primary">Visualizar</a>
                    <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="btn btn-secondary">Editar</a>
                    <button wire:click="delete({{ $fornecedor->id }})" class="btn btn-danger">Excluir</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
