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
    <script src="{{ asset('js/ouvidoria-atendimento.js') }}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="{{ asset('css/ouvidoria-atendimento.css') }}?v={{ time() }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/fontawesome-pro.css') }}" />
</head>

<body>
    <div id="atendimento" class="atendimento">
        <div class="logout-top">
            <div class="voltar-top">
                <a class="button-voltar" href="javascript:history.back()">Voltar</a>
            </div>

            <div class="logado">
                <span><strong>Logado:
                    </strong>

                    @if ($user->cpf)
                        {{ substr($user->cpf, 0, 3) . '******' . substr($user->cpf, -2) }}
                    @else
                        {{ substr($user->email, 0, 3) . '***@***' . substr($user->email, -2) }}
                    @endif
                </span>
                <button class="button-sair" onclick="sair()">Sair</button>
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
                <span><strong>Status: </strong>{{ $atendimento->status }}</span>
            </div>
        </div>

        <div class="container">
            <div class="painel">
                @if ($atendimento->sigiloso == 0)
                    <span>Sem Sigilo</span>
                @else
                    <span>sigiloso</span>
                @endif

                <p>Finalidade: {{ $atendimento->tipo }}</p>

                <p>Prioridade: {{ $atendimento->prioridade }}</p>

                <p>Em: {{ date('d/m/Y', strtotime($atendimento->created_at)) }}</p>
            </div>
            <div class="info">
                <div class="title user">
                    <h1 class="assunto">Assunto: {{ $atendimento->assunto }}</h1>
                </div>

                <p>{{ $mensagens[0]->mensagem }}</p>
                @if ($mensagens[0]->arquivo !== null)
                    <div class="anexos">
                        Anexos: <a href="/arquivo/{{ $mensagens[0]->arquivo }}" target="blank"><i
                                class="far fa-file-contract"></i></a>
                    </div>
                @endif

            </div>
        </div>

        @foreach ($mensagens as $mensagem)
            @if (!$loop->first)
                <div class="res {{ $mensagem->autor == 'camara' ? '' : 'usuario' }}">
                    <div class="title {{ $mensagem->autor == 'camara' ? 'sec' : 'user' }}">
                        @if ($mensagem->autor == 'camara')
                            <h1>
                                <i class="fas fa-university" style="margin-right: 8px"></i>
                                Camâra municipal de viçosa
                            </h1>
                        @else
                            <h1>
                                <i class="fas fa-user" style="margin-right: 8px"></i>
                                Você
                            </h1>
                        @endif

                    </div>

                    <p>{{ $mensagem->mensagem }}</p>
                    @if ($mensagem->arquivo !== null)
                        <div class="anexos">
                            Anexos: <a href="/arquivo/{{ $mensagem->arquivo }}" target="blank"><i
                                    class="far fa-file-contract"></i></a>
                        </div>
                    @endif
                </div>
            @endif
        @endforeach



        <form class="new-text form" id="cad-resposta-user">
            <label for="atendimentoUsuario"><strong>Interagir em Atendimento</strong></label>
            <textarea id="atendimentoUsuario" name="atendimentoUsuario" class="atendimentoUsuario" rows="8"></textarea>
            <input type="file" id="arquivo" name="arquivo">
            <input type="hidden" name="autor" id="autor" value="usuario">
            <input type="hidden" name="id_atendimento" id="id_atendimento" value="{{ $atendimento->numero }}">
            <button type="submit">ENVIAR</button>
        </form>
    </div>
</body>

</html>
