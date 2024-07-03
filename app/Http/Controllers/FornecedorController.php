<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\FornecedorRepositoryInterface;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    private $fornecedorRepository;

    public function __construct(FornecedorRepositoryInterface $fornecedorRepository)
    {
        $this->fornecedorRepository = $fornecedorRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return $this->fornecedorRepository->all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([       

                'nome_fantazia'     => 'required|string|max:255',
                'razao_social'      => 'required|string|max:255',
                'cnpj'              => 'nullable|string|size:14|unique:fornecedores,cnpj',
                'cpf'               => 'nullable|string|size:11|unique:fornecedores,cpf',
                'nome_contato'      => 'nullable|string|max:255',
                'email_contato'     => 'nullable|string|max:255',
                'cel_contato'       => 'nullable|string|max:10',
                'endereco'          => 'nullable|string|max:300',
            ]);

            if ($request->has('cnpj')) {
                $response = Http::get('https://brasilapi.com.br/api/cnpj/v1/' . $request->cnpj);
                if ($response->failed()) {
                    return response()->json(['error' => 'CNPJ inválido'], 422);
                }
            }

            $fornecedor = $this->fornecedorRepository->create($validatedData);

            Log::create([
                'user_id' => auth()->id(),
                'action' => 'create',
                'description' => 'Fornecedor criado: ' . $fornecedor->id,
            ]);

            return $fornecedor;
        } catch (\Exception $e) {
            \Log::error('Erro ao criar fornecedor: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao criar fornecedor'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->fornecedorRepository->find($id);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'nome_fantazia'     => 'required|string|max:255',
                'razao_social'      => 'required|string|max:255',
                'cnpj'              => 'nullable|string|size:14|unique:fornecedores,cnpj',
                'cpf'               => 'nullable|string|size:11|unique:fornecedores,cpf',
                'nome_contato'      => 'nullable|string|max:255',
                'email_contato'     => 'nullable|string|max:255',
                'cel_contato'       => 'nullable|string|max:10',
                'endereco'          => 'nullable|string|max:300',
            ]);

            if ($request->has('cnpj') && $request->cnpj !== $this->fornecedorRepository->find($id)->cnpj) {
                $response = Http::get('https://brasilapi.com.br/api/cnpj/v1/' . $request->cnpj);
                if ($response->failed()) {
                    return response()->json(['error' => 'CNPJ inválido'], 422);
                }
            }

            $fornecedor = $this->fornecedorRepository->update($validatedData, $id);

            Log::create([
                'user_id' => auth()->id(),
                'action' => 'update',
                'description' => 'Fornecedor atualizado: ' . $fornecedor->id,
            ]);

            return $fornecedor;
        } catch (\Exception $e) {
            \Log::error('Erro ao atualizar fornecedor: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao atualizar fornecedor'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $this->fornecedorRepository->delete($id);

            Log::create([
                'user_id' => auth()->id(),
                'action' => 'delete',
                'description' => 'Fornecedor excluído: ' . $id,
            ]);

            return response()->noContent();
        } catch (\Exception $e) {
            \Log::error('Erro ao excluir fornecedor: ' . $e->getMessage());
            return response()->json(['error' => 'Erro ao excluir fornecedor'], 500);
        }
    }
}
