function mostraResidencial() {
    $('#contrata-residencial').fadeToggle()
}

function mostraBusiness() {
    $('#contrata-business').fadeToggle()
}

function mostraNomade() {
    $('#contrata-nomade').fadeToggle()
}

function mostraNautica() {
    $('#contrata-nautica').fadeToggle()
}



function deslogado() {
    alert("Você não realizou seu Login! Entre na sua conta ou crie uma para fazer assinatura de planos.");
}

function boleto() {
    $(".mostra-boleto").show();
    $(".mostra-pix").hide();
    $(".mostra-cartao").hide();

    $(".mostra-botao1").hide();
    $(".mostra-botao2").hide();
    $(".mostra-botao3").show();
}

function pix() {
    $(".mostra-boleto").hide();
    $(".mostra-pix").show();
    $(".mostra-cartao").hide();

    $(".mostra-botao1").show();
    $(".mostra-botao2").hide();
    $(".mostra-botao3").hide();
}


function cartao() {
    $(".mostra-boleto").hide();
    $(".mostra-pix").hide();
    $(".mostra-cartao").show();

    $(".mostra-botao1").hide();
    $(".mostra-botao2").show();
    $(".mostra-botao3").hide();
}



