<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ouvidoria - Atendimentos</title>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/ouvidoria-atendimentos.js') }}"></script>

    <link href="{{ asset('css/ouvidoria-atendimentos.css') }}?v={{ time() }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/fontawesome-pro.css') }}" />
</head>

<body>
    <div id="atendimentos" class="atendimentos">
        <div class="logout-top">

            <div class="logado">
                <span><strong>Logado:</strong>
                    @if ($user->cpf)
                        {{ substr($user->cpf, 0, 3) . '******' . substr($user->cpf, -2) }}
                    @else
                        {{ substr($user->email, 0, 3) . '***@***' . substr($user->email, -2) }}
                    @endif
                </span>
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
                            <h1>
                                <div
                                    class="seu-container {{ $atendimento->situacao == 'Novo' ? 'background-novo' : ($atendimento->situacao == 'Finalizado' ? 'background-finalizado' : 'background-andamento') }}">
                                    {{ $atendimento->situacao }}
                                </div>
                                {{ $atendimento->assunto }}
                            </h1>
                            <strong>
                                <p>Em: {{ date('d/m/Y', strtotime($atendimento->created_at)) }}</p>
                            </strong>
                        </div>
                        <div class="btn">
                            <div class="container-span">
                                <span><strong>Tipo: </strong>{{ $atendimento->tipo }}</span>
                            </div>

                            <span><strong>Status: </strong>{{ $atendimento->status }}</span>
                            <a class="btn-visualizar"
                                href="{{ route('usuario-atendimento', ['id' => $atendimento->id]) }}">Visualizar</a>
                        </div>
                    </div>
                @endforeach


            </div>
        @endif

        <form class="new-text form" id="cad-novo-atendimento">

            <label for="atendimento"><strong>Novo atendimento <i class="fas fa-plus"></i></strong></label>

            <div class="container-inputs">
                <label for="tipo">Tipo: </label>
                <select id="tipo" name="tipo">
                    <option value="elogio">Elogio</option>
                    <option value="denuncia">Denúncia</option>
                    <option value="reclamacao">Reclamação</option>
                    <option value="sugestao">Sugestão</option>
                    <option value="simplificada">Simplificada</option>
                </select>

                <label for="prioridade">Prioridade: </label>
                <select id="prioridade" name="prioridade">
                    <option value="baixa">Baixa</option>
                    <option value="media">Média</option>
                    <option value="alta">Alta</option>
                    <option value="urgente">Urgente</option>
                </select>

                <label for="sigilo">Sigilo: </label>
                <select id="sigilo" name="sigilo">
                    <option value="semSigilo">Sem sigilo</option>
                    <option value="sigiloso">Sigiloso</option>
                </select>
            </div>

            <label for="assunto">Assunto *</label>
            <p class="assunto-obg" style="display: none">Assunto obrigátorio</p>
            <input type="text" id="assunto" name="assunto" placeholder="Digite aqui o assunto da nova solicitação"
                required>
            <textarea id="atendimento" name="atendimento" class="atendimento" rows="8"></textarea>
            <input type="file" id="arquivo" name="arquivo">

            <input type="hidden" name="autor" id="autor" value="usuario">
            <button>ENVIAR</button>
        </form>
    </div>
</body>


</html>
