@inject('Helper', '\App\Helper\Helper')

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ouvidoria - Atendimento {{ $Helper->leftPad($atendimento->numero) }}/{{ $atendimento->ano }}
    </title>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <link href="{{ asset('css/ouvidoria-atendimento.css') }}?v={{ time() }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/fontawesome-pro.css') }}" />
</head>

<body>
    <div id="atendimento" class="atendimento">
        <div class="logout-top">
            <div class="voltar-top">
                <button class="button-voltar" onclick="inicio()">Voltar</button>
            </div>

            <div class="logado">
                @if ($user->cnpj === null)
                    <span><strong>Logado:
                        </strong>{{ substr($user->cpf, 0, 3) . '.*****-' . substr($user->cpf, -2) }}</span>
                @else
                    <span><strong>Logado:
                        </strong>{{ substr($user->cnpj, 0, 3) . '.*****-' . substr($user->cnpj, -2) }}</span>
                @endif
                <button class="button-sair" onclick="inicio()">Sair</button>
            </div>
        </div>
        <div class="ticket">
            <div class="number-atendimento">
                <i class="far fa-bullhorn"></i>
                <h2>Atendimento</h2>
                <p> - {{ $Helper->leftPad($atendimento->numero) }}/{{ $atendimento->ano }}</p>
            </div>
            <div class="info-atendimento">
                <span><strong>Situação atual: </strong>{{ $atendimento->situacao }}</span>
                <span><strong>Código:</strong> nº {{ $atendimento->codigo }}</span>
            </div>




        </div>

        <div class="container">
            <div class="painel">

                <span>{{ $atendimento['sigiloso'] ? 'Sigiloso' : 'Sem sigilo' }}</span>

                <p>Finalidade: <strong>{{ $atendimento->tipo }}</strong></p>

                <p>Em: {{ $Helper->convertDate($atendimento->created_at) }}</p>
            </div>
            <div class="info">
                <div class="title">
                    <h1>{{ $atendimento->assunto }}</h1>
                </div>

                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Id, iure. Perspiciatis incidunt dolores non
                    quos corporis, in at fugit doloremque. Asperiores fuga odit natus quod vel labore doloremque
                    nesciunt modi.</p>

            </div>
        </div>

        <div class="new-text">
            <label for="atendimento"><strong>Interagir em Atendimento</strong></label>
            <textarea id="atendimento" name="atendimento" class="atendimento" rows="8"></textarea>
            <input type="file" id="arquivo" name="arquivo">
            <button>ENVIAR</button>
        </div>
    </div>
</body>

</html>
