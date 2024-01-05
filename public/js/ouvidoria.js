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

// $(function () {
//     $('[name="tipoCadastro"]').change(function () {
//         let tipo = $('[name="tipoCadastro"]:checked').val();

//         if (tipo == "pessoaFisica") {
//             $(".pf").show();
//             $(".pj").hide();
//         } else {
//             $(".pf").hide();
//             $(".pj").show();
//         }
//     });
// });

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
});
