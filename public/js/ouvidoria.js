function openModal() {
    const email = $("#emailCadastro").val();

    document.getElementById('email').value = email;

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
    //$("#modal").hide();
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
        $(".home").each((index, el) => $(el).hide());
        $("#modal").each((index, el) => $(el).hide());

        // SE LOGIN E SENHA FOR OK
        location.replace("/ouvidoria/consulta");
    }
}

function inicio() {
    location.replace("/ouvidoria");
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
                //$('.msg').text(resposta.msg);
                //$('.msg').show();
                // location.replace('/atendimento/' + resposta.id);
            } else {
                alert(resposta.msg);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest, textStatus, errorThrown);
            alert('teste' + error);
        }
    });

}
$(() => $('form').submit(function (e) {
    console.log('TEste');
    efetuarCadastro();
    e.preventDefault();
}));
