@section('title', 'Fornecedores')


<div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <!-- Campo de Pesquisa -->
                    <div class="form-group">
                        <input type="text" wire:model.live="search" class="form-control" placeholder="Pesquisar por Nome Fantasia ou Razão Social...">
                    </div>

                    <div class="row">
                        <div class="col-2">
                            <a href="{{ route('fornecedores.create') }}" class="btn btn-success mt-2">Novo Castro</i></a>
                        </div>

                        <div class="col-10">
                            <h2 class="h2 mt-3 mb-4 text-center">Listar Fornecedores</h2>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped table-centered">
                        <thead>
                            <tr>
                                <th>
                                    <a href="#" wire:click.prevent="sortBy('nome_fantazia')">Nome Fantasia</a>
                                    @if($sortField === 'nome_fantazia')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </th>
                                <th>
                                    <a href="#" wire:click.prevent="sortBy('razao_social')">Razão Social</a>
                                    @if($sortField === 'razao_social')
                                    <i class="fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                                    @endif
                                </th>
                                <th width="10%">CNPJ</th>
                                <th>Nome Contato</th>
                                <th>Email Contato</th>
                                <th>Celular Contato</th>
                                <th>Endereço</th>
                                <th class="text-center" width="10%">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome_fantazia }}</td>
                                <td>{{ $fornecedor->razao_social }}</td>
                                <td>{{ $fornecedor->cnpj }}</td>
                                <td>{{ $fornecedor->nome_contato }}</td>
                                <td>{{ $fornecedor->email_contato }}</td>
                                <td>{{ $fornecedor->cel_contato }}</td>
                                <td>{{ $fornecedor->endereco }}</td>
                                <td class="text-center">
                                    <a href="{{ route('fornecedores.show', $fornecedor->id) }}" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></a>
                                    <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="btn btn-secondary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <button wire:click="delete({{ $fornecedor->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Links de Paginação -->
                    {{ $fornecedores->links() }}
                </div>
            </div>
        </div>
    </div>
</div>