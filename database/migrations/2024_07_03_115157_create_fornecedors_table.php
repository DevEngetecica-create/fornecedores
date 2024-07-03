<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('nome_fantazia');
            $table->string('razao_social');
            $table->string('cnpj')->nullable()->unique();
            $table->string('cpf')->nullable()->unique();
            $table->string('nome_contato')->nullable();
            $table->string('email_contato')->nullable();
            $table->string('cel_contato')->nullable();
            $table->string('endereco')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedors');
    }
};
