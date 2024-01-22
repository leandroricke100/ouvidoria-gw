function openModal() {

    $(".home").each((index, el) => $(el).hide());
    $("#consulta-protocolo").hide();
    $("#modal").show();

}

function closeModal() {
    $("#modal").each((index, el) => $(el).hide());
    $(".home").show();
    $("#consulta-protocolo").show();
}

$(function () {
    $('[name="tipoCadastro"]').change(function () {
        let tipo = $('[name="tipoCadastro"]:checked').val();

        if (tipo === "pessoaFisica") {
            $(".pf").show();
            $(".pj").hide();
            document.getElementById("razaoSocial").removeAttribute("required");
            document.getElementById("cnpj").removeAttribute("required");
            document.getElementById("nomeResponsavel").removeAttribute("required");
        } else {
            $(".pf").hide();
            $(".pj").show();
            document.getElementById("nomeCompleto").removeAttribute("required");
            document.getElementById("cpf").removeAttribute("required");
        }
    });

    $('[name="tipoCadastro"]').change();


    $('#confirmarSenha').change(function () {
        let conf_senha = $(this).val();
        let senha = $('#senha').val();

        if (senha != conf_senha) {
            $('.msg-senha').show();
        } else {
            $('.msg-senha').hide();
        }
    });

    $('#confirmar-nova-senha').change(function () {
        let conf_senha = $(this).val();
        let senha = $('#senha-nova').val();

        if (senha != conf_senha) {
            $('.confirmar-senha').show();
        } else {
            $('.confirmar-senha').hide();
        }
    });


    const menuItems = document.querySelectorAll('.menu-estrutura');
    const modalSubMenu = document.querySelector('.modalMenu');

    menuItems.forEach(item => {
        item.addEventListener('mouseover', () => {
            modalSubMenu.style.display = 'block';
        });

        item.addEventListener('mouseout', () => {
            modalSubMenu.style.display = 'none';
        })
    })




});

function login() {

    const email = $("#emailLogin").val();
    const senha = $("#password").val();
    if (email === "" || senha === "") {

    } else {

        let dadosLogin = {
            email: email,
            senha: senha,
            metodo: 'login',
        }

        $.ajax({
            url: '/api/OuvidoriaLogin',
            type: "POST",
            dataType: "json",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: dadosLogin,
            success: function (resposta) {
                console.log(resposta);
                if (resposta.status) {

                } else {

                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest, textStatus, errorThrown);

            }
        });
        // SE LOGIN E SENHA FOR OK
        location.replace("/ouvidoria/atendimentos");
    }
}

function efetuarCadastro() {
    let dadosForm = new FormData($('#cad-atendimento')[0]);

    $.ajax({
        url: '/api/Ouvidoria',
        type: "POST",
        dataType: "json",
        contentType: false,
        processData: false,
        cache: false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: dadosForm,
        success: function (resposta) {
            console.log(resposta);
            if (resposta.status) {

                location.reload();
            } else {

            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest, textStatus, errorThrown);

        }
    });

    location.replace("/ouvidoria/atendimentos");
}

function novaSenha() {
    $('#email-formulario').hide();
    $('#recuperar-senha').show();
    $('#div-nova-senha').hide();
}

function entrar() {
    $('#email-formulario').show();
    $('#recuperar-senha').hide();
    $('#nova-senha').hide();

}

$(() => $('form').submit(function (e) {
    efetuarCadastro();
    e.preventDefault();
}));

function recuperarSenha() {
    let email = $("#emailRecuperar").val();

    if (email == "") return alert("Preencha um email");

    emailCadastrado = {
        email: email,
    }

    $.ajax({
        url: '/api/OuvidoriaRecuperarLogin',
        type: "POST",
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: emailCadastrado,
        success: function (resposta) {
            console.log(resposta);
            if (resposta.status) {


                $('#email-formulario').hide();
                $('#recuperar-senha').hide();
                $('#div-nova-senha').show();

            } else {

            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest, textStatus, errorThrown);

        }
    });

}

function salvarNovaSenha() {
    let email = $("#emailRecuperar").val();
    let token = $('#token').val();
    let senha = $('#senha-nova').val();
    let confirmarSenha = $('#confirmar-nova-senha').val();

    let dadosSenha = {
        email: email,
        token: token,
        senha: senha,
        confirmarSenha: confirmarSenha,
    }



    $.ajax({
        url: '/api/OuvidoriaRecuperarSenha',
        type: "POST",
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: dadosSenha,
        success: function (resposta) {
            console.log(resposta);
            if (resposta.status) {

                location.reload();
            } else {

            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest, textStatus, errorThrown);

        }
    });

}

function openMenuModal() {
    $("#menu-modal-mobile").show();
    $('.modalMenu').show();
}

function closeMenuModal() {
    $('#menu-modal-mobile').hide();
}

function validarSenha() {
    const senha = $("#senha").val();
    const confirmarSenha = $("#confirmarSenha").val();


    const senhaMaiscula = /[A-Z]/;
    const senhaCaracterEspecial = /[!@#$%^&*(),.?":{}|<>]/;

    if (!senhaMaiscula.test(senha) || !senhaCaracterEspecial.test(senha)) {
        alert('A senha deve conter letra maiúscula e caractere especial.')
        return false;
    }

    if (senha !== confirmarSenha) {
        alert('As senhas não coincidem.');
        return false;
    }

    if (senha.length < 8) {
        alert('A senha deve conter pelo menos 8 caracteres');
        return false;
    }
}

$(document).ready(function () {
    const emailInput = $('#emailLogin');

    emailInput.focus();

    emailInput.on('blur', function () {
        const passwordInput = $('#password');

        passwordInput.focus();
    });

    $('#protocolo').mask('0000.000.000');
    $('#cpf').mask('000.000.000-00', { reverse: true });
    $('#cnpj').mask('00.000.000/0000-00', { reverse: true });
    $('#celular').mask('(00) 0 0000-0000');
    $('#cep').mask('00000-000');
});

function buscarProtocolo() {
    let numberProtocolo = $('#protocolo').val();
    let data = $('#dataProtocolo').val();

    let protocolo = {
        numberProtocolo: numberProtocolo,
        data: data
    }

    console.log(protocolo)

    $.ajax({
        url: '/api/OuvidoriaProtocolo',
        type: "POST",
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: protocolo, // DADOS QUE TO ENVIANDO PRA FUNCTION BACKEND
        success: function (resposta) {
            console.log(resposta);
            if (resposta.status) {

                popNotif({ msg: resposta.msg, time: 2000 });
                location.replace(resposta.link);
            } else {
                popNotif({ tipo: 'error', msg: resposta.msg, time: 2000 });
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest, textStatus, errorThrown);

        }
    });
}
