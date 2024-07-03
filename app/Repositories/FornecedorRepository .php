<?php

namespace App\Repositories;

use App\Models\Fornecedor;
use App\Repositories\Interfaces\FornecedorRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class FornecedorRepository implements FornecedorRepositoryInterface
{
    public function all(): Collection
    {
        return Cache::remember('fornecedores.all', 60*60, function() {
            return Fornecedor::all();
        });
    }

    public function find(int $id): ?Fornecedor
    {
        return Cache::remember("fornecedores.{$id}", 60*60, function() use ($id) {
            return Fornecedor::find($id);
        });
    }

    public function create(array $data): Fornecedor
    {
        $fornecedor = Fornecedor::create($data);
        Cache::forget('fornecedores.all');
        return $fornecedor;
    }

    public function update(array $data, int $id): ?Fornecedor
    {
        $fornecedor = Fornecedor::find($id);
        if ($fornecedor) {
            $fornecedor->update($data);
            Cache::forget('fornecedores.all');
            Cache::forget("fornecedores.{$id}");
            return $fornecedor;
        }
        return null;
    }

    public function delete(int $id): bool
    {
        $fornecedor = Fornecedor::find($id);
        if ($fornecedor) {
            $fornecedor->delete();
            Cache::forget('fornecedores.all');
            Cache::forget("fornecedores.{$id}");
            return true;
        }
        return false;
    }
}

