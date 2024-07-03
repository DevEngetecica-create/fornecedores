<?php

namespace App\Repositories\Interfaces;

use App\Models\Fornecedor;
use Illuminate\Support\Collection;

interface FornecedorRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Fornecedor;
    public function create(array $data): Fornecedor;
    public function update(array $data, int $id): ?Fornecedor;
    public function delete(int $id): bool;
}
