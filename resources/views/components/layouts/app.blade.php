<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fornecedores') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main id="app">
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    <!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- jQuery Mask Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Aplica a máscara ao campo CNPJ
            $('#cnpj').mask('00.000.000/0000-00');

            // Realiza a validação do CNPJ ao perder o foco
            $('#cnpj').on('blur', function() {
                var cnpj = $(this).val().replace(/\D/g, ''); // Remove os caracteres não numéricos
                if (cnpj.length == 14) {
                    $.ajax({
                        url: 'https://brasilapi.com.br/api/cnpj/v1/' + cnpj,
                        method: 'GET',
                        success: function(response) {
                            // Sucesso: O CNPJ é válido
                            console.log(response);
                            $('#nome_fantazia').val(response.nome_fantasia);
                            $('#razao_social').val(response.razao_social);
                            $('#endereco').val(response.descricao_tipo_de_logradouro + " " + response.logradouro + ", " + response.numero + ", " + response.bairro + "-" + response.cidade + "/ " + response.uf );
                            //$('#cnpj').val('');
                        },
                        error: function() {
                            // Erro: O CNPJ é inválido
                            alert('CNPJ inválido');
                            $('#cnpj').val(''); // Limpa o campo
                        }
                    });
                }
            });
        });
    </script>

    <script>
        function showAlert(message) {
            Swal.fire({
                title: 'Success!',
                text: message,
                icon: 'success',
                confirmButtonText: 'OK'
            });
        }
    </script>

    @livewireScripts



</body>

</html>