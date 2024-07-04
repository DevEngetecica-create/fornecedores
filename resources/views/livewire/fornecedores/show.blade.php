<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            
          <!--   <h2>Visualizar Fornecedor</h2>
            <p><strong>Nome Fantasia:</strong> {{ $fornecedor->nome_fantazia }}</p>
            <p><strong>Razão Social:</strong> {{ $fornecedor->razao_social }}</p>
            <p><strong>CNPJ:</strong> {{ $fornecedor->cnpj }}</p>
            <p><strong>CPF:</strong> {{ $fornecedor->cpf }}</p>
            <p><strong>Nome do Contato:</strong> {{ $fornecedor->nome_contato }}</p>
            <p><strong>Email do Contato:</strong> {{ $fornecedor->email_contato }}</p>
            <p><strong>Celular do Contato:</strong> {{ $fornecedor->cel_contato }}</p>
            <p><strong>Endereço:</strong> {{ $fornecedor->endereco }}</p> -->

            <a href="{{ route('fornecedores.index') }}" class="btn btn-primary mb-3">Voltar</a>

            <table class="table table-bordered table-striped">
                      
                        <tbody>
                            <tr>
                                <td>
                                    <dl class="row m-1">
                                        <dt class="col-sm-2"><strong>Nome Fantasia:</strong></dt>
                                        <dd class="col-sm-9">{{ $fornecedor->nome_fantazia }}</dd>
                                    </dl>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <dl class="row m-1">
                                        <dt class="col-sm-2"><strong>Razão Social:</strong></dt>
                                        <dd class="col-sm-9">{{ $fornecedor->razao_social }}</dd>
                                    </dl>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <dl class="row m-1">
                                        <dt class="col-sm-2"><strong>CNPJ:</strong></dt>
                                        <dd class="col-sm-9">{{ $fornecedor->cnpj }}</dd>
                                    </dl>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <dl class="row m-1">
                                        <dt class="col-sm-2"><strong>CPF:</strong></dt>
                                        <dd class="col-sm-9">{{ $fornecedor->cpf }}</dd>
                                    </dl>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <dl class="row m-1">
                                        <dt class="col-sm-2"><strong>Nome do Contato:</strong></dt>
                                        <dd class="col-sm-9">{{ $fornecedor->nome_contato }}</dd>
                                    </dl>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <dl class="row m-1">
                                        <dt class="col-sm-2"><strong>Email do Contato:</strong></dt>
                                        <dd class="col-sm-9">{{ $fornecedor->email_contato }}</dd>
                                    </dl>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <dl class="row m-1">
                                        <dt class="col-sm-2"><strong>Celular do Contato:</strong></dt>
                                        <dd class="col-sm-9">{{ $fornecedor->cel_contato }}</dd>
                                    </dl>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <dl class="row m-1">
                                        <dt class="col-sm-2"><strong>Endereço</strong></dt>
                                        <dd class="col-sm-9"> {{ $fornecedor->endereco }}</dd>
                                    </dl>
                                </td>
                            </tr>                           

                        </tbody>
                    </table>

        </div>
    </div>

</div>