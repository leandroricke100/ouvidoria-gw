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
                alert(resposta.msg);
                location.reload();
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
    novoAtendimento();
    e.preventDefault();
}));
