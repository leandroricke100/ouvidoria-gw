function openModal() {
    const email = $("#emailCadastro").val();

    $('#email').val(email);

    //document.getElementById('email').value = email;

    if (email == "") {
        alert("Preencha um email");
    } else {
        $(".home").each((index, el) => $(el).hide());
        $("#modal").show();
    }
}

function closeModal() {
    $("#modal").each((index, el) => $(el).hide());
    $(".home").show();
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


});

function login() {

    const email = $("#emailLogin").val();
    const senha = $("#password").val();
    if (email === "" || senha === "") {
        alert("Preencha um email e senha válidos!");
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
                    alert(resposta.msg);
                } else {
                    alert(resposta.msg);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest, textStatus, errorThrown);
                alert('teste2' + error);
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
                alert(resposta.msg);
            } else {
                alert(resposta.msg);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest, textStatus, errorThrown);
            alert('teste1' + error);
        }
    });

    location.replace("/ouvidoria/atendimentos");
}

function novaSenha() {
    document.getElementById('email-formulario').style.display = 'none';
    document.getElementById('nova-senha').style.display = 'block';
    document.getElementById('novo-cadastro').style.display = 'none';
}

function entrar() {
    document.getElementById('email-formulario').style.display = 'block';
    document.getElementById('novo-cadastro').style.display = 'block';
    document.getElementById('nova-senha').style.display = 'none';
}

$(() => $('form').submit(function (e) {
    efetuarCadastro();
    e.preventDefault();
}));


