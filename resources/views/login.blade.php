<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ouvidoria - Consulta</title>

    <script src="{{ asset('js/jquery.min.js') }}"></script>


    <script src="{{ asset('js/ouvidoria.js') }}?v={{ time() }}"></script>
    <link href="{{ asset('css/consulta.css') }}?v={{ time() }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/fontawesome-pro.css') }}" />
</head>

<body>
    <div id="atendimento" class="atendimento">
        <div class="logout-top">
            <div class="voltar-top">
                <button class="button-voltar" onclick="inicio()">Voltar</button>
            </div>

            <div class="logado">
                <span><strong>Logado:</strong> 395.****-19</span>
                <button class="button-sair" onclick="inicio()">Sair</button>
            </div>
        </div>
        <div class="ticket">
            <div class="number-atendimento">
                <i class="far fa-bullhorn"></i>
                <h2>Atendimento</h2>
                <p> - 103/2024</p>
            </div>
            <div class="info-atendimento">
                <span><strong>Situação atual:</strong> Novo</span>
                <span><strong>Código:</strong> nº 658.817.047.393.330.402</span>
            </div>




        </div>

        <div class="container">
            <div class="painel">
                <span>
                    Sigiloso
                </span>

                <p>Finalidade: <strong>Elogio</strong></p>

                <p>Em 08/01/2024 às 15:42</p>
            </div>
            <div class="info">
                <div class="title">
                    <h1>Assistência social</h1>
                </div>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi in enim vel, quo rerum exercitationem
                    pariatur voluptate, perspiciatis voluptates maxime eos, consectetur quae fuga possimus nihil
                    doloremque. Voluptatibus, aut mollitia.</p>

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
