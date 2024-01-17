@inject('Helper', '\App\Helper\Helper')

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN-Atendimento {{ $Helper->leftPad($atendimento->numero) }}/{{ $atendimento->ano }}
    </title>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin-atendimento.js') }}"></script>

    <link href="{{ asset('css/admin-atendimento.css') }}?v={{ time() }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/fontawesome-pro.css') }}" />
</head>

<body>
    <div id="atendimento" class="atendimento">

        <div class="ticket">
            <div class="number-atendimento">
                <i class="far fa-bullhorn"></i>
                <h2>Atendimento</h2>
                <p> - {{ $Helper->leftPad($atendimento->numero) }}/{{ $atendimento->ano }}</p>
            </div>
            <div class="info-atendimento">
                <input type="hidden" name="id" id="id" value="{{ $atendimento->id }}">
                <div>
                    <label for="situacao"><strong>Situação atual: </strong></label>
                    <select id="situacao" name="situacao">
                        <option value="Novo" {{ $atendimento->situacao == 'novo' ? 'selected' : '' }}>Novo</option>
                        <option value="Andamento" {{ $atendimento->situacao == 'andamento' ? 'selected' : '' }}>
                            Andamento</option>
                        <option value="Finalizado" {{ $atendimento->situacao == 'finalizado' ? 'selected' : '' }}>
                            Finalizado</option>
                    </select>
                </div>
                <div>
                    <span><strong>Código:</strong> nº {{ $atendimento->codigo }}</span>
                </div>
                <div>
                    <label for="resposta"><strong>Aguardando resposta:</strong></label>
                    <select id="resposta" name="resposta">
                        <option value="camara" {{ $mensagens[0]->autor == 'camara' ? 'selected' : '' }}>Camâra</option>
                        <option value="usuario" {{ $mensagens[0]->autor == 'usuario' ? 'selected' : '' }}>Usuário
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="painel">
                @if ($atendimento->sigiloso == 0)
                    <span>Sem Sigilo</span>
                @else
                    <span>sigiloso</span>
                @endif

                <p>Finalidade: <strong>{{ $atendimento->tipo }}</strong></p>

                <p>Prioridade: {{ $atendimento->prioridade }}</p>

                <p>Em: {{ date('d/m/Y', strtotime($atendimento->created_at)) }}</p>
            </div>
            <div class="info">
                <div class="title user">

                    <h1>Assunto: {{ $atendimento->assunto }}</h1>
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

                            <button class="trash" onclick="deleteMsg({{ $mensagem->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        @else
                            <h1>
                                <i class="fas fa-user" style="margin-right: 8px"></i>
                                Usuario
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



        <form class="new-text form" id="cad-resposta">
            <label for="atendimentoRes"><strong>Interagir em Atendimento</strong></label>
            <textarea id="atendimentoRes" name="atendimentoRes" class="atendimentoRes" rows="8"></textarea>
            <input type="file" id="arquivo" name="arquivo">
            <input type="hidden" name="autor" id="autor" value="camara">
            <input type="hidden" name="id_atendimento" id="id_atendimento" value="{{ $atendimento->numero }}">
            <button type="submit">ENVIAR</button>
        </form>
    </div>
</body>

</html>
