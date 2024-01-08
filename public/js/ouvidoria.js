function openModal() {
    const email = $("#email").val();
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
    const email = $("#email").val();
    const senha = $("#password").val();
    if (email == " " || senha == " ") {
        alert("Preencha um email ou senha válido!");
    } else {
        $(".home").each((index, el) => $(el).hide());
        $("#modal").each((index, el) => $(el).hide());

        // SE LOGIN E SENHA FOR OK
        location.replace("/ouvidoria/consulta");
    }
}
