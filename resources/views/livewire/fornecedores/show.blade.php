<div>
    <h2>Visualizar Fornecedor</h2>
    <p><strong>Nome Fantasia:</strong> {{ $fornecedor->nome_fantazia }}</p>
    <p><strong>Razão Social:</strong> {{ $fornecedor->razao_social }}</p>
    <p><strong>CNPJ:</strong> {{ $fornecedor->cnpj }}</p>
    <p><strong>CPF:</strong> {{ $fornecedor->cpf }}</p>
    <p><strong>Nome do Contato:</strong> {{ $fornecedor->nome_contato }}</p>
    <p><strong>Email do Contato:</strong> {{ $fornecedor->email_contato }}</p>
    <p><strong>Celular do Contato:</strong> {{ $fornecedor->cel_contato }}</p>
    <p><strong>Endereço:</strong> {{ $fornecedor->endereco }}</p>
    <a href="{{ route('fornecedores.index') }}" class="btn btn-primary">Voltar</a>
</div>
