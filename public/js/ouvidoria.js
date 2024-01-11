function openModal() {
    const email = $("#emailCadastro").val();
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
        } else {
            $(".pf").hide();
            $(".pj").show();
        }
    });

    $('[name="tipoCadastro"]').change();
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
            console.log('tudo ok')

            if (resposta.status == false) {
                //$('.msg').text(resposta.msg);
                //$('.msg').show();

                console.log('deu errado')
            } else {
                // exibe msg
                console.log('tudo ok')
                //location.replace('/atendimento/' + resposta.id);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest, textStatus, errorThrown);
            alert('Deu erro');
        }
    });

}









$(() => $('form').submit((e) => e.preventDefault()));
