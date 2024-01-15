function efetuarCadastro() {
    let dadosRespostForm = new FormData($('#cad-resposta')[0]);
    let id = $('#cad-resposta').data('id');



    $.ajax({
        url: '/api/admin/ouvidoria/atendimento/' + id,
        type: "POST",
        dataType: "json",
        contentType: false,
        processData: false,
        cache: false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: dadosRespostForm,
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
            alert('teste' + error);
        }
    });

}
$(() => $('form').submit(function (e) {
    efetuarCadastro();
    e.preventDefault();
}));
