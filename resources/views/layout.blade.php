<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titulo }}</title>

    <script src="{{ asset('js/tools/jquery.min.js') }}"></script>
    <script src="{{ asset('js/tools/jquery.mask.js') }}"></script>
    <script src="{{ asset('js/global.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/fontawesome-pro.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <script src="{{ asset('js/tools/toastr.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/tools/toastr.min.css') }}" />

    @stack('head')

</head>

<body>


    @if (!isset($header) || $header)
        <header class="header-web">
            <div class="brasao">
                <img src="https://portalfacilarquivos.blob.core.windows.net/uploads/VICOSA/imgOrig/%7B60DC018A-0135-EE5B-476B-0E350B5C15BB%7D.jpg"
                    alt="logo da prefeitura" />
                <H1>PREFEITURA DE VIÇOSA -MG</H1>
            </div>
            <div class="menu">
                <ul>
                    <li id="menu-inicio"><button>INÍCIO</button></li>
                    <li id="menu-noticias"><button>NOTÍCIAS</button></li>
                    <li id="menu-estrutura" class="menu-estrutura"><button>ESTRUTURA DO GOVERNO <i
                                class="fas fa-angle-down" style="margin-left: 5px"></i></button>
                    </li>
                    <li id="menu-servicos"><button>SERVIÇOS</button></li>
                    <li id="menu-transparencia"><button>TRANSPARÊNCIA</button></li>
                </ul>
            </div>

            <div class="modalMenu" style="display: none">
                <ul>
                    <li id="prefeito"><button>PREFEITO</button></li>
                    <li id="secretarias"><button>SECRETARIAS</button></li>
                    <li id="fundacoes"><button>FUNDAÇÕES</button></li>
                    <li id="empresas"><button>EMPRESAS E AUTARQUIAS</button></li>
                    <li id="cordenadorias"><button>CORDENADORIAS DE ATENDIMENT0</button></li>
                </ul>
                <div class="modalMenuPrefeito" style="display: none">
                    <div class="modalButton">
                        <button>PREFEITO</button>
                        <button>TESTE</button>
                    </div>
                </div>
                <div class="modalMenuSecretaria" style="display: none
        ">
                    <div class="modalButton">
                        <button>FAZENDA</button>
                        <button>MEIO AMBIENTE</button>
                        <button>OBRAS</button>
                    </div>
                </div>
            </div>
        </header>

        <header class="header-mobile">
            <div class="brasao">
                <img
                    src="https://portalfacilarquivos.blob.core.windows.net/uploads/VICOSA/imgOrig/%7B60DC018A-0135-EE5B-476B-0E350B5C15BB%7D.jpg" />
                <H1>PREFEITURA DE VIÇOSA -MG</H1>
            </div>

            <div class="menu-oculto">
                <button class="button-menu" onclick="openMenuModal()"><i class="fas fa-bars"
                        style="margin-right: 8px"></i>Menu</button>
            </div>

            <div id="menu-modal-mobile">
                <div class="div-botao-fechar">
                    <button class="botao-fechar" onclick="closeMenuModal()"><i class="fas fa-times"></i></button>
                </div>
                <div class="menu-mobile">
                    <button>INÍCIO</button>
                    <button>NOTÍCIAS</button>
                    <button>ESTRUTURA DE GOVERNO</button>
                    <button>SERVIÇOS</button>
                    <button>TRANSPARÊNCIA</button>
                </div>
            </div>
        </header>
    @endif

    @yield('conteudo')

    @if (!isset($footer) || $footer)
        <footer class="footer">
            <div id="brasao-footer" class="brasao">
                <img src="https://portalfacilarquivos.blob.core.windows.net/uploads/VICOSA/imgOrig/%7B60DC018A-0135-EE5B-476B-0E350B5C15BB%7D.jpg"
                    alt="logo da prefeitura" />
                <H1>PREFEITURA DE VIÇOSA -MG</H1>
            </div>

            <div class="info-endereco">
                <div class="redes-social">
                    <a href="" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="" target="_blank"><i class="fab fa-instagram"></i></i></a>
                    <a href="" target="_blank"><i class="fab fa-youtube"></i></i></span>
                </div>
                <div class="endereco">
                    <p>Av. Afonso Pena, 1212 - Centro</p>
                    <a class="politica" href="">Política de privacidade</a>
                    <a class="gw" href="https://governoweb.com.br/prototipo" target="_blank"><i>Desenvolvido por
                            Gwlegis</i></a>
                </div>
            </div>
        </footer>
    @endif


    @stack('foot')

</body>
