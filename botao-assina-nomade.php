<?php

if (!isset($_SESSION['email'])) {

?>


        <button onclick="deslogado();" class="planos-botao">Assinar</button>

<?php
} else {

?>

        <button onclick="mostraNomade();" class="planos-botao">Assinar</button>

<?php
}
?>