<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ouvidoria - Atendimentos</title>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

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

        <div class="container">

            <div class="info">
                <div class="title">
                    <h1>Assistência social</h1>
                    <strong>
                        <p>Em: 12/01/2024</p>
                    </strong>
                </div>

                <button class="btn-visualizar">Visualizar</button>

            </div>

            <div class="info">
                <div class="title">
                    <h1>Despesas</h1>
                    <strong>
                        <p>Em: 14/09/2023</p>
                    </strong>
                </div>

                <button class="btn-visualizar">Visualizar</button>
            </div>

            <div class="info">
                <div class="title">
                    <h1>Site</h1>
                    <strong>
                        <p>Em: 25/12/2023</p>
                    </strong>
                </div>

                <button class="btn-visualizar">Visualizar</button>
            </div>
        </div>

        <div class="new-text">

            <label for="atendimento"><strong>Novo atendimento <i class="fas fa-plus"></i></strong></label>

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
