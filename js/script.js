$(function() {
    $('team_member').hover(function() {
        $(this).addClass('hover');
    }, function() {
        $(this).removeClass('hover');
    });
}


);


$('img').on('dragstart', function(event) { event.preventDefault(); });


function detecta(){
if(document.getElementById("detectabotao")){
    myFunction()
} else {

}
}


function deletaParametro(){

    let url = new URL('http://localhost/LIGHTSPEED%20WEBSITE%20v2/index.php?success');
    let params = new URLSearchParams(url.search);
    
    // Delete the foo parameter.
    params.delete('success'); //Query string is now: 'bar=2'


}

function voltaIndex(){
//window.location.href = "index.php";
}

function mostraPainel() {
    $('.modal-painel').fadeToggle()
    $('.modalfundo-cadastro').fadeToggle()
    }

function myFunction() {
    $('.modal').fadeToggle()
    $('.modalfundo').fadeToggle()
    }

function mostraCadastro() {
    $('.modal-cadastro').fadeToggle()
    $('.modalfundo-cadastro').fadeToggle()
    }

function chatFlutuante() {
    $('#div-mostra-teste').fadeToggle()
    }
    
