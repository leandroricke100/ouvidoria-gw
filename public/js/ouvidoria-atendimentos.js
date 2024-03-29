function novoAtendimento() {
    let dadosForm = new FormData($('#cad-novo-atendimento')[0]);

    $.ajax({
        url: '/api/OuvidoriaAtendimento',
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
}

$(() => $('form').submit(function (e) {
    novoAtendimento();
    e.preventDefault();
}));

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

            } else {

            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest, textStatus, errorThrown);

        }

    });

    location.replace("/ouvidoria/");
}
