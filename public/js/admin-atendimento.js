function respostaAdmin() {
    let dadosForm = new FormData($('#cad-resposta')[0]);

    $.ajax({
        url: '/api/OuvidoriaMensagemAdmin',
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
    respostaAdmin();
    e.preventDefault();
}));

function deleteMsg(id) {

    $.ajax({
        url: '/api/OuvidoriaDeleteMensagem', // CAMINHO DA FUNCTION NO CONTROLLER (api.php)
        type: "POST",
        dataType: "json",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            id: id
        }, // DADOS QUE TO ENVIANDO PRA CONTROLLER
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

$(() => {
    $('#situacao').change(function () {
        updateInput();
    });

    $('#resposta').change(function () {
        updateInput();
    });
})

function updateInput() {
    let inputSitucao = $('#situacao').val();
    let inputResposta = $('#resposta').val();
    let id = $('#id').val();

    let dadosForm = {
        situacao: inputSitucao,
        resposta: inputResposta,
        id: id,
    };


    $.ajax({
        url: '/api/OuvidoriaInputAdmin',
        type: "POST",
        dataType: "json",
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
