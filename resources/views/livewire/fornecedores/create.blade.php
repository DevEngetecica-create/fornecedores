<div>
    <h2>Cadastrar Fornecedor</h2>
    <form wire:submit.prevent="submit">
        <div class="form-group">
            <label for="nome_fantazia">Nome Fantasia</label>
            <input type="text" id="nome_fantazia" wire:model="nome_fantazia" class="form-control">
            @error('nome_fantazia') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="razao_social">Razão Social</label>
            <input type="text" id="razao_social" wire:model="razao_social" class="form-control">
            @error('razao_social') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input type="text" id="cnpj" wire:model="cnpj" class="form-control">
            @error('cnpj') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" id="cpf" wire:model="cpf" class="form-control">
            @error('cpf') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="nome_contato">Nome do Contato</label>
            <input type="text" id="nome_contato" wire:model="nome_contato" class="form-control">
            @error('nome_contato') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="email_contato">Email do Contato</label>
            <input type="email" id="email_contato" wire:model="email_contato" class="form-control">
            @error('email_contato') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="cel_contato">Celular do Contato</label>
            <input type="text" id="cel_contato" wire:model="cel_contato" class="form-control">
            @error('cel_contato') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" wire:model="endereco" class="form-control">
            @error('endereco') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
