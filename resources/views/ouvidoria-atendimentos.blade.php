<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ouvidoria - Atendimentos</title>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/ouvidoria.js') }}"></script>

    <link href="{{ asset('css/ouvidoria-atendimentos.css') }}?v={{ time() }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/fontawesome-pro.css') }}" />
</head>

<body>
    <div id="atendimentos" class="atendimentos">
        <div class="logout-top">

            <div class="logado">
                <span><strong>Logado:</strong> 395.****-19</span>
                <button class="button-sair" onclick="inicio()">Sair</button>
            </div>
        </div>
        <div class="ticket">
            <div class="number-atendimento">
                <i class="far fa-bullhorn"></i>
                <h2>Meus Atendimentos</h2>
            </div>
        </div>

        @if (!$atendimentos)
            <h1>Nenhum atendimento</h1>
        @else
            <div class="container">
                @foreach ($atendimentos as $atendimento)
                    <div class="info">
                        <div class="title">
                            <h1>{{ $atendimento->assunto }}</h1>
                            <strong>
                                <p>Em: {{ date('d/m/Y', strtotime($atendimento->created_at)) }}</p>
                            </strong>
                        </div>
                        <div class="btn">
                            <span><strong>Tipo: </strong>{{ $atendimento->tipo }}</span>
                            <span><strong>Status: </strong>Aguardando resposta da Câmara</span>
                            <a class="btn-visualizar"
                                href="{{ route('usuario-atendimento', ['id' => $atendimento->id]) }}">Visualizar</a>
                        </div>
                    </div>
                @endforeach


            </div>
        @endif

        <div class="new-text">

            <label for="atendimento"><strong>Novo atendimento <i class="fas fa-plus"></i></strong></label>

            <label for="tipo">Tipo</label>
            <select id="tipo" name="tipo" required>
                <option value="" disabled selected>Selecione</option>
                <option value="denuncia">Denúncia</option>
                <option value="elogio">Elogio</option>
                <option value="reclamacao">Reclamação</option>
                <option value="sugestao">Sugestão</option>
                <option value="simplificada">Simplificada</option>
            </select>

            <label for="assunto">Assunto *</label>
            <input type="text" id="assunto" name="assunto" placeholder="Digite aqui o assunto da nova solicitação"
                required>
            <textarea id="atendimento" name="atendimento" class="atendimento" rows="8"></textarea>
            <input type="file" id="arquivo" name="arquivo">
            <button>ENVIAR</button>
        </div>
    </div>
</body>

</html>
