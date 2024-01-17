function respostaUsuario() {
    let dadosForm = new FormData($('#cad-resposta-user')[0]);

    $.ajax({
        url: '/api/OuvidoriaMensagemUser',
        type: "POST",
        dataType: "json",
        contentType: false,
        processData: false,
        cache: false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: dadosForm, // DADOS QUE TO ENVIANDO PRA FUNCTION BACKEND
        success: function (resposta) {
            console.log(resposta);
            if (resposta.status) {
                alert(resposta.msg);
                location.reload();
            } else {
                alert(resposta.msg);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest, textStatus, errorThrown);
            alert('teste4' + error);
        }
    });
}

function sair() {
    $.ajax({
        url: '/api/OuvidoriaLogin',
        type: "POST",
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            metodo: 'sair',
        },
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

    location.replace("/ouvidoria");
}

$(() => $('form').submit(function (e) {
    respostaUsuario();
    e.preventDefault();
}));
