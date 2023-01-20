<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <?php
  $timestamp = date("YmdHis");
  ?>
  <link rel="stylesheet" href="css/style.css?v=<?php echo $timestamp; ?>">
  <link rel="stylesheet" href="css/flutuante.css?v=<?php echo $timestamp; ?>">
  <link rel="stylesheet" href="css/modal-login-flutuante.css?v=<?php echo $timestamp; ?>">
  <link rel="stylesheet" href="css/modal-cadastro-flutuante.css?v=<?php echo $timestamp; ?>">
  <link rel="stylesheet" href="css/modal-painel-flutuante.css?v=<?php echo $timestamp; ?>">
  <link rel="stylesheet" href="css/modal-residencial.css?v=<?php echo $timestamp; ?>">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css?v=<?php echo $timestamp; ?>">
  <script src="https://kit.fontawesome.com/ced1a7adbf.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Viva a velocidade, viva o futuro.">
  <title>Lightspeed: viva a velocidade.</title>
  <link rel="icon" type="image/x-icon" href="images/icon site.png">
</head>

<body onload="detecta()">
  <!--DETECTOR PARA EXIBIR A MENSAGEM DE CADASTRO CONCLUIDO-->
  <?php
  if ((isset($_GET['success'])) && (!isset($_SESSION['email']))) {
    echo '<div id="detectabotao"></div>';
  } else {
  }
  ?>
  <!--INSERE O CADASTRO DO USUARIO NO BANCO DE DADOS SE O BOTÃO FOR PRESSIONADO-->
  <?php
  if (isset($_POST['submit_cadastro'])) {
    include_once('conexao.php');
    $nome = $_POST['nome-cadastro'];
    $sobrenome = $_POST['sobrenome-cadastro'];
    $email = $_POST['email-cadastro'];
    $senha = $_POST['senha-cadastro'];
    $endereco = $_POST['endereco-cadastro'];
    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,sobrenome,email,senha,endereco) 
    VALUES ('$nome','$sobrenome','$email','$senha','$endereco')");
    header('Location: index.php?success');
  }
  if (isset($_POST['submit_residencial'])) {
    include_once('conexao.php');
    $email = $_SESSION['email'];
    $result = mysqli_query($conexao, "UPDATE usuarios SET plano = 'Residencial' WHERE email = '$email'");

    $plano = mysqli_query($conexao, "SELECT plano FROM usuarios WHERE email = '$email'");

    $row = mysqli_fetch_assoc($plano);

    $_SESSION['plano'] = $row;

    header('Location: index.php');
  }

  if (isset($_POST['submit_business'])) {
    include_once('conexao.php');
    $email = $_SESSION['email'];
    $result = mysqli_query($conexao, "UPDATE usuarios SET plano = 'Business' WHERE email = '$email'");

    $plano = mysqli_query($conexao, "SELECT plano FROM usuarios WHERE email = '$email'");

    $row = mysqli_fetch_assoc($plano);

    $_SESSION['plano'] = $row;

    header('Location: index.php');
  }
  
  if (isset($_POST['submit_nomade'])) {
    include_once('conexao.php');
    $email = $_SESSION['email'];
    $result = mysqli_query($conexao, "UPDATE usuarios SET plano = 'Nomade' WHERE email = '$email'");

    $plano = mysqli_query($conexao, "SELECT plano FROM usuarios WHERE email = '$email'");

    $row = mysqli_fetch_assoc($plano);

    $_SESSION['plano'] = $row;

    header('Location: index.php');
  }
  
  if (isset($_POST['submit_nautica'])) {
    include_once('conexao.php');
    $email = $_SESSION['email'];
    $result = mysqli_query($conexao, "UPDATE usuarios SET plano = 'Nautica' WHERE email = '$email'");

    $plano = mysqli_query($conexao, "SELECT plano FROM usuarios WHERE email = '$email'");

    $row = mysqli_fetch_assoc($plano);

    $_SESSION['plano'] = $row;

    header('Location: index.php');
  }


  ?>
  <!------------------------------------------------------------>
  <!--------------------MODALS DE USUARIO----------------------->
  <!------------------------------------------------------------>
  <!-- MODAL FLUTUANTE LOGIN INICIA  -->
  <div class="modal-login-flutuante">
    <div id="id01" class="modal">
      <form class="modal-content animate" method="POST" action="login.php">
        <div class="imgcontainer">
          <span onclick="myFunction();myFunction2();" class="close" title="Close Modal">&times;</span>
          <img src="images/icon site.png" alt="Avatar" class="avatar">
        </div>
        <div class="cadastro-titulo"> <b> <span>LOGIN</span></b></div>
        <?php
        if (isset($_GET['success'])) {
          echo '<p>';
          echo '<span style="color:rgb(245, 131, 0);"><b>Cadastro realizado com sucesso!</b></span>';
        } else {
        }
        ?>
        <div class="container">
          <label><b>Email</b></label>
          <input type="text" placeholder="Escreva seu email" name="email" required>
          <label><b>Senha</b></label>
          <input type="password" placeholder="Escreva sua senha" name="senha" required>
          <div class="login-button" onclick="deletaParametro();">
            <button type="submit" id="entrar" name="submit_login">Login</button>
          </div>
          <div class="textos-abaixo-login">
            <span class="span-cadastro">Não possui cadastro? <a onclick="myFunction();mostraCadastro();" href="#">Crie
                aqui!</a></span>
            <div class="check-lembrar">
            </div>
          </div>
        </div>
        <div class="container-forgotsenha" style="background-color:#f1f1f1">
          <div class="cancel-button">
            <button type="button" onclick="myFunction();myFunction2();deletaParametro();" class="cancelbtn">Cancelar</button>
            <span class="psw">Esqueceu sua <a href="#">senha?</a></span>
          </div>
        </div>
      </form>
    </div>
    <div id="id02" class="modalfundo">
    </div>
  </div>
  <!-- MODAL FLUTUANTE LOGIN TERMINA  -->

  <!-- MODAL FLUTUANTE CADASTRO INICIA  -->
  <div class="modal-cadastro-flutuante">
    <div id="modal-cadastro01" class="modal-cadastro">
      <form class="modal-content" method="POST" action="index.php">
        <div class="imgcontainer">
          <span onclick="mostraCadastro();mostraCadastroFundo();" class="close" title="Close Modal">&times;</span>
          <img src="images/icon site.png" alt="Avatar" class="avatar">
        </div>
        <div class="cadastro-titulo"> <b> <span>CADASTRO</span></b></div>
        <div class="container">
          <label><b>Email</b></label>
          <input type="text" placeholder="Escreva seu email" name="email-cadastro" required>
          <div class="nome-sobrenome">
            <div class="caixa">
              <label><b>Nome</b></label>
              <input type="text" placeholder="Escreva seu nome" name="nome-cadastro" required>
            </div>
            <div class="caixa">
              <label><b>Sobrenome</b></label>
              <input type="text" placeholder="Escreva seu sobrenome" name="sobrenome-cadastro" required>
            </div>
          </div>
          <label><b>Endereco</b></label>
          <input type="text" placeholder="Escreva seu sobrenome" name="endereco-cadastro" required>
          <label><b>Senha</b></label>
          <input type="password" placeholder="Escreva sua senha" name="senha-cadastro" required>
          <div class="login-button">
            <button type="submit" name="submit_cadastro" onclick="submitMe();">Cadastrar-se</button>
          </div>
          <div class="textos-abaixo-login">
            <span class="span-cadastro">Já possui cadastro? <a onclick="mostraCadastro();myFunction();" href="#">Clique
                aqui!</a></span>
            <div class="check-lembrar">
            </div>
          </div>
        </div>
        <div class="container-forgotsenha" style="background-color:#f1f1f1">
          <div class="cancel-button">
            <button type="button" onclick="mostraCadastro();mostraCadastroFundo();" class="cancelbtn">Cancelar</button>
            <span class="psw">Esqueceu sua <a href="#">senha?</a></span>
          </div>
        </div>
      </form>
    </div>
    <div id="modal-cadastro02" class="modalfundo-cadastro">
    </div>
  </div>
  <!-- MODAL FLUTUANTE CADASTRO TERMINA  -->

  <!-- MODAL FLUTUANTE PAINEL INICIA  -->
  <div class="modal-painel-flutuante">
    <div id="painel01" class="modal-painel">
      <form class="modal-content" action="/action_page.php">
        <div class="imgcontainer">
          <span onclick="mostraPainel();voltaIndex();" class="close" title="Close Modal">&times;</span>
          <img src="images/icon site.png" alt="Avatar" class="avatar">
        </div>
        <div class="cadastro-titulo"> <b> <span>PAINEL LIGHTSPEED</span></b></div>
        <div class="container-painel">
          <div>
            <fieldset style="width:300px;">
              <legend style="display: inline-block; align-items: center;"> <img src="images/icon site.png" style="width: 16px;"> <b>Informações Pessoais:</b></legend>
              <div>
                <span> <b>Nome:</b></span> <span><?php echo $_SESSION['nome']; ?></span>
              </div>
              <div>
                <span><b>Sobrenome:</b></span> <span><?php echo $_SESSION['sobrenome']; ?></span>
              </div>
              <div>
                <span><b>E-mail:</b></span> <span><?php echo $_SESSION['email']; ?></span>
              </div>
              <div>
                <span><b>Endereco:</b></span> <span><?php echo $_SESSION['endereco']; ?></span>
              </div>
            </fieldset>
          </div>
          <div>
            <fieldset style="width:300px;">
              <legend style="display: inline-block; align-items: center;"> <img src="images/icon site.png" style="width: 16px;"><b>Detalhes do seu plano:</b></legend>
              <div>
                <div>
                  <span><b>Serviço:</b></span>
                  <span>
                    <?php
                    if (($_SESSION['plano'] == '')) {
                      echo "Nenhum plano contratado.";
                    } else {
                      echo  $_SESSION['plano']['plano'] ;
                    }
                    ?>
                  </span>
                </div>
                <div>
                  <span><b>Adicionais:</b></span>
                  <span>
                    <?php
                    if (($_SESSION['adicional_um'] == '')) {
                      echo "Nenhum adicional contratado.";
                    } else {
                    echo $_SESSION['adicional_um'];
                    }
                    ?>
                  </span>
                </div>
              </div>
            </fieldset>
          </div>
        </div>
        <div class="container-forgotsenha" style="background-color:#f1f1f1">
          <div class="cancel-button">
            <?php include('botaodeslogar.php'); ?>
          </div>
        </div>
      </form>
    </div>
    <div id="modal-cadastro02" class="modalfundo-cadastro">
    </div>
  </div>
  <!-- MODAL FLUTUANTE PAINEL TERMINA  -->
  <!------------------------------------------------------------>
  <!-----------------------MODAL PLANOS------------------------->
  <!------------------------------------------------------------>
  <!-- MODAL RESIDENCIAL INICIA  -->

  <!--RESIDENCIAL-->
  <div class="modal-plano-contrata" id="contrata-residencial">
    <div class="conteudo">
      <div class="blocagem">

        <div class="bloco-esquerdo">
          <div class="container">
            <i class="fa-solid fa-house"></i>
            <h3 class="planos-titulo">Residencial</h3>
            <div class="planos-valor">R$259,90<span>/mês</span></div>
          </div>
        </div>

        <div class="divisao"></div>

        <div class="bloco-direito">
          <div class="forma-pagamento">
            <h3>Escolha sua forma de pagamento:</h3>
            <div class="mostra-botao1">
              <div class="botoes botao1">
                <button onclick="pix()"><i class="fa-brands fa-pix"></i> PIX</button>
                <button onclick="cartao()"><i class="fa-regular fa-credit-card"></i> CARTÃO</button>
                <button onclick="boleto()"><i class="fa-sharp fa-solid fa-barcode"></i> BOLETO</button>
              </div>
            </div>
            <div class="mostra-botao2">
              <div class="botoes botao2">
                <button onclick="pix()"><i class="fa-brands fa-pix"></i> PIX</button>
                <button onclick="cartao()"><i class="fa-regular fa-credit-card"></i> CARTÃO</button>
                <button onclick="boleto()"><i class="fa-sharp fa-solid fa-barcode"></i> BOLETO</button>
              </div>
            </div>

            <div class="mostra-botao3">
              <div class="botoes botao3">
                <button onclick="pix()"><i class="fa-brands fa-pix"></i> PIX</button>
                <button onclick="cartao()"><i class="fa-regular fa-credit-card"></i> CARTÃO</button>
                <button onclick="boleto()"><i class="fa-sharp fa-solid fa-barcode"></i> BOLETO</button>
              </div>
            </div>


          </div>

          <div class="mostra-cartao">
            <div class="pagamento-cartao" id="pagamento-cartao">
              <div class="container">

                <div class="container1">
                  <div data-aos="fade-right" class="opcao-cartao-input info-cartao">
                    <b>Número do Cartão:</b>
                    <input class="cartao-input" type="text" name="numerocartao" required>
                  </div>
                  <div data-aos="fade-right" class="opcao-cartao-input info-cvv">
                    <b>CVV:</b>
                    <input class="cartao-input" type="text" name="cvv" maxlength="3" required>
                  </div>
                </div>

                <div class="container2">
                  <div data-aos="fade-right" class="opcao-cartao-input nome-titular">
                    <b>Nome do Titular:</b>
                    <input class="cartao-input" type="text" name="titular" required>
                  </div>
                  <div data-aos="fade-right" class="opcao-cartao-input">
                    <b>Data de Validade:</b>
                    <div data-aos="fade-right" class="data-validade">

                      <div class="box-mes">
                        <div class="opcao-cartao-input info-data">
                          <input class="cartao-input" type="text" name="cvv" maxlength="2" required>
                        </div>
                      </div>

                      <div class="box-ano">
                        <div class="opcao-cartao-input info-data">
                          <input class="cartao-input" type="text" name="cvv" maxlength="2" required>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                <form method="POST" action="index.php">
                  <div class="botao">
                    <button type="submit" name="submit_residencial"><b>REALIZAR ASSINATURA</b></button>
                  </div>
                </form>

              </div>
            </div>
          </div>

          <div class="mostra-pix">
            <div class="pagamento-pix" id="pagamento-pix">
              <div class="container">
                <div class="imagem-qr">
                  <img src="images/QR.PNG.png" alt="">
                </div>
                <form method="POST" action="index.php">
                  <div class="botao">
                    <button type="submit" name="submit_residencial"><b>JÁ REALIZEI O PAGAMENTO</b></button>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <div class="mostra-boleto">
            <div class="pagamento-boleto" id="pagamento-boleto">
              <div class="container">
                <div class="imagem-qr">
                  <img src="images/boleto.png" alt="">
                </div>
                <form method="POST" action="index.php">
                  <div class="botao">
                    <button type="submit" name="submit_residencial"><b>JÁ REALIZEI O PAGAMENTO</b></button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div data-aos="fade-right" class="botao-cancel">
            <button onclick="mostraResidencial()"><b>CANCELAR</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modalfundoresidencial">
    </div>
  </div>
  
  <!--BUSINESS-->
  <div class="modal-plano-contrata" id="contrata-business">
    <div class="conteudo">
      <div class="blocagem">

        <div class="bloco-esquerdo">
          <div class="container">
            <i class="fa-solid fa-briefcase"></i>
            <h3 class="planos-titulo">BUSINESS</h3>
            <div class="planos-valor">R$1.000<span>/mês</span></div>
          </div>
        </div>

        <div class="divisao"></div>

        <div class="bloco-direito">
          <div class="forma-pagamento">
            <h3>Escolha sua forma de pagamento:</h3>
            <div class="mostra-botao1">
              <div class="botoes botao1">
                <button onclick="pix()"><i class="fa-brands fa-pix"></i> PIX</button>
                <button onclick="cartao()"><i class="fa-regular fa-credit-card"></i> CARTÃO</button>
                <button onclick="boleto()"><i class="fa-sharp fa-solid fa-barcode"></i> BOLETO</button>
              </div>
            </div>
            <div class="mostra-botao2">
              <div class="botoes botao2">
                <button onclick="pix()"><i class="fa-brands fa-pix"></i> PIX</button>
                <button onclick="cartao()"><i class="fa-regular fa-credit-card"></i> CARTÃO</button>
                <button onclick="boleto()"><i class="fa-sharp fa-solid fa-barcode"></i> BOLETO</button>
              </div>
            </div>

            <div class="mostra-botao3">
              <div class="botoes botao3">
                <button onclick="pix()"><i class="fa-brands fa-pix"></i> PIX</button>
                <button onclick="cartao()"><i class="fa-regular fa-credit-card"></i> CARTÃO</button>
                <button onclick="boleto()"><i class="fa-sharp fa-solid fa-barcode"></i> BOLETO</button>
              </div>
            </div>


          </div>

          <div class="mostra-cartao">
            <div class="pagamento-cartao" id="pagamento-cartao">
              <div class="container">

                <div class="container1">
                  <div data-aos="fade-right" class="opcao-cartao-input info-cartao">
                    <b>Número do Cartão:</b>
                    <input class="cartao-input" type="text" name="numerocartao" required>
                  </div>
                  <div data-aos="fade-right" class="opcao-cartao-input info-cvv">
                    <b>CVV:</b>
                    <input class="cartao-input" type="text" name="cvv" maxlength="3" required>
                  </div>
                </div>

                <div class="container2">
                  <div data-aos="fade-right" class="opcao-cartao-input nome-titular">
                    <b>Nome do Titular:</b>
                    <input class="cartao-input" type="text" name="titular" required>
                  </div>
                  <div data-aos="fade-right" class="opcao-cartao-input">
                    <b>Data de Validade:</b>
                    <div data-aos="fade-right" class="data-validade">

                      <div class="box-mes">
                        <div class="opcao-cartao-input info-data">
                          <input class="cartao-input" type="text" name="cvv" maxlength="2" required>
                        </div>
                      </div>

                      <div class="box-ano">
                        <div class="opcao-cartao-input info-data">
                          <input class="cartao-input" type="text" name="cvv" maxlength="2" required>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                <form method="POST" action="index.php">
                  <div class="botao">
                    <button type="submit" name="submit_business"><b>REALIZAR ASSINATURA</b></button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="mostra-pix">
            <div class="pagamento-pix" id="pagamento-pix">
              <div class="container">
                <div class="imagem-qr">
                  <img src="images/QR.PNG.png" alt="">
                </div>
                <form method="POST" action="index.php">
                  <div class="botao">
                    <button type="submit" name="submit_business"><b>JÁ REALIZEI O PAGAMENTO</b></button>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <div class="mostra-boleto">
            <div class="pagamento-boleto" id="pagamento-boleto">
              <div class="container">
                <div class="imagem-qr">
                  <img src="images/boleto.png" alt="">
                </div>
                <form method="POST" action="index.php">
                  <div class="botao">
                    <button type="submit" name="submit_business"><b>JÁ REALIZEI O PAGAMENTO</b></button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div data-aos="fade-right" class="botao-cancel">
            <button onclick="mostraBusiness()"><b>CANCELAR</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modalfundoresidencial">
    </div>
  </div>
  
  <!--NOMADE-->
  <div class="modal-plano-contrata" id="contrata-nomade">
    <div class="conteudo">
      <div class="blocagem">

        <div class="bloco-esquerdo">
          <div class="container">
            <i class="fa-solid fa-earth-americas"></i>
            <h3 class="planos-titulo">NÔMADE</h3>
            <div class="planos-valor">R$159,90<span>/mês</span></div>
          </div>
        </div>

        <div class="divisao"></div>

        <div class="bloco-direito">
          <div class="forma-pagamento">
            <h3>Escolha sua forma de pagamento:</h3>
            <div class="mostra-botao1">
              <div class="botoes botao1">
                <button onclick="pix()"><i class="fa-brands fa-pix"></i> PIX</button>
                <button onclick="cartao()"><i class="fa-regular fa-credit-card"></i> CARTÃO</button>
                <button onclick="boleto()"><i class="fa-sharp fa-solid fa-barcode"></i> BOLETO</button>
              </div>
            </div>
            <div class="mostra-botao2">
              <div class="botoes botao2">
                <button onclick="pix()"><i class="fa-brands fa-pix"></i> PIX</button>
                <button onclick="cartao()"><i class="fa-regular fa-credit-card"></i> CARTÃO</button>
                <button onclick="boleto()"><i class="fa-sharp fa-solid fa-barcode"></i> BOLETO</button>
              </div>
            </div>

            <div class="mostra-botao3">
              <div class="botoes botao3">
                <button onclick="pix()"><i class="fa-brands fa-pix"></i> PIX</button>
                <button onclick="cartao()"><i class="fa-regular fa-credit-card"></i> CARTÃO</button>
                <button onclick="boleto()"><i class="fa-sharp fa-solid fa-barcode"></i> BOLETO</button>
              </div>
            </div>


          </div>

          <div class="mostra-cartao">
            <div class="pagamento-cartao" id="pagamento-cartao">
              <div class="container">

                <div class="container1">
                  <div data-aos="fade-right" class="opcao-cartao-input info-cartao">
                    <b>Número do Cartão:</b>
                    <input class="cartao-input" type="text" name="numerocartao" required>
                  </div>
                  <div data-aos="fade-right" class="opcao-cartao-input info-cvv">
                    <b>CVV:</b>
                    <input class="cartao-input" type="text" name="cvv" maxlength="3" required>
                  </div>
                </div>

                <div class="container2">
                  <div data-aos="fade-right" class="opcao-cartao-input nome-titular">
                    <b>Nome do Titular:</b>
                    <input class="cartao-input" type="text" name="titular" required>
                  </div>
                  <div data-aos="fade-right" class="opcao-cartao-input">
                    <b>Data de Validade:</b>
                    <div data-aos="fade-right" class="data-validade">

                      <div class="box-mes">
                        <div class="opcao-cartao-input info-data">
                          <input class="cartao-input" type="text" name="cvv" maxlength="2" required>
                        </div>
                      </div>

                      <div class="box-ano">
                        <div class="opcao-cartao-input info-data">
                          <input class="cartao-input" type="text" name="cvv" maxlength="2" required>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                                <form method="POST" action="index.php">
                  <div class="botao">
                    <button type="submit" name="submit_residencial"><b>REALIZAR ASSINATURA</b></button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="mostra-pix">
            <div class="pagamento-pix" id="pagamento-pix">
              <div class="container">
                <div class="imagem-qr">
                  <img src="images/QR.PNG.png" alt="">
                </div>
                <form method="POST" action="index.php">
                  <div class="botao">
                    <button type="submit" name="submit_nomade"><b>JÁ REALIZEI O PAGAMENTO</b></button>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <div class="mostra-boleto">
            <div class="pagamento-boleto" id="pagamento-boleto">
              <div class="container">
                <div class="imagem-qr">
                  <img src="images/boleto.png" alt="">
                </div>
                <form method="POST" action="index.php">
                  <div class="botao">
                    <button type="submit" name="submit_nomade"><b>JÁ REALIZEI O PAGAMENTO</b></button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div data-aos="fade-right" class="botao-cancel">
            <button onclick="mostraNomade()"><b>CANCELAR</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modalfundoresidencial">
    </div>
  </div>
  
  <!--NAUTICA-->
  <div class="modal-plano-contrata" id="contrata-nautica">
    <div class="conteudo">
      <div class="blocagem">

        <div class="bloco-esquerdo">
          <div class="container">
            <i class="fa-solid fa-anchor"></i>
            <h3 class="planos-titulo">NÁUTICA</h3>
            <div class="planos-valor">R$199,90<span>/mês</span></div>
          </div>
        </div>

        <div class="divisao"></div>

        <div class="bloco-direito">
          <div class="forma-pagamento">
            <h3>Escolha sua forma de pagamento:</h3>
            <div class="mostra-botao1">
              <div class="botoes botao1">
                <button onclick="pix()"><i class="fa-brands fa-pix"></i> PIX</button>
                <button onclick="cartao()"><i class="fa-regular fa-credit-card"></i> CARTÃO</button>
                <button onclick="boleto()"><i class="fa-sharp fa-solid fa-barcode"></i> BOLETO</button>
              </div>
            </div>
            <div class="mostra-botao2">
              <div class="botoes botao2">
                <button onclick="pix()"><i class="fa-brands fa-pix"></i> PIX</button>
                <button onclick="cartao()"><i class="fa-regular fa-credit-card"></i> CARTÃO</button>
                <button onclick="boleto()"><i class="fa-sharp fa-solid fa-barcode"></i> BOLETO</button>
              </div>
            </div>

            <div class="mostra-botao3">
              <div class="botoes botao3">
                <button onclick="pix()"><i class="fa-brands fa-pix"></i> PIX</button>
                <button onclick="cartao()"><i class="fa-regular fa-credit-card"></i> CARTÃO</button>
                <button onclick="boleto()"><i class="fa-sharp fa-solid fa-barcode"></i> BOLETO</button>
              </div>
            </div>


          </div>

          <div class="mostra-cartao">
            <div class="pagamento-cartao" id="pagamento-cartao">
              <div class="container">

                <div class="container1">
                  <div data-aos="fade-right" class="opcao-cartao-input info-cartao">
                    <b>Número do Cartão:</b>
                    <input class="cartao-input" type="text" name="numerocartao" required>
                  </div>
                  <div data-aos="fade-right" class="opcao-cartao-input info-cvv">
                    <b>CVV:</b>
                    <input class="cartao-input" type="text" name="cvv" maxlength="3" required>
                  </div>
                </div>

                <div class="container2">
                  <div data-aos="fade-right" class="opcao-cartao-input nome-titular">
                    <b>Nome do Titular:</b>
                    <input class="cartao-input" type="text" name="titular" required>
                  </div>
                  <div data-aos="fade-right" class="opcao-cartao-input">
                    <b>Data de Validade:</b>
                    <div data-aos="fade-right" class="data-validade">

                      <div class="box-mes">
                        <div class="opcao-cartao-input info-data">
                          <input class="cartao-input" type="text" name="cvv" maxlength="2" required>
                        </div>
                      </div>

                      <div class="box-ano">
                        <div class="opcao-cartao-input info-data">
                          <input class="cartao-input" type="text" name="cvv" maxlength="2" required>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

                                <form method="POST" action="index.php">
                  <div class="botao">
                    <button type="submit" name="submit_nautica"><b>REALIZAR ASSINATURA</b></button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="mostra-pix">
            <div class="pagamento-pix" id="pagamento-pix">
              <div class="container">
                <div class="imagem-qr">
                  <img src="images/QR.PNG.png" alt="">
                </div>
                <form method="POST" action="index.php">
                  <div class="botao">
                    <button type="submit" name="submit_nautica"><b>JÁ REALIZEI O PAGAMENTO</b></button>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <div class="mostra-boleto">
            <div class="pagamento-boleto" id="pagamento-boleto">
              <div class="container">
                <div class="imagem-qr">
                  <img src="images/boleto.png" alt="">
                </div>
                <form method="POST" action="index.php">
                  <div class="botao">
                    <button type="submit" name="submit_nautica"><b>JÁ REALIZEI O PAGAMENTO</b></button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div data-aos="fade-right" class="botao-cancel">
            <button onclick="mostraNautica()"><b>CANCELAR</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modalfundoresidencial">
    </div>
  </div>


  <!-- MODAL RESIDENCIAL TERMINA  -->
  <!-- CHAT FLUTUANTE INICIA  -->
  <div class="chat-flutuante-geral" id="chat-flutuante-geral">
    <div class="botao-flutuante">
      <button class="botao-chat" onclick="chatFlutuante()">
        <i class="fa-solid fa-comment"></i>
      </button>
    </div>
    <div id="div-mostra-teste" class="animated animatedFadeInUp fadeInUp">
      <div class="chatbox">
        <div class="chatbox-titulo">
          <img src="images/icon site.png">
          <span>ATENDIMENTO LIGHTSPEED</span>
        </div>
        <section class="chat-window">
          <article class="msg-container msg-remote" id="msg-0">
            <div class="msg-box">
              <img class="user-img" id="user-0" src="images/icon site.png" />
              <div class="flr">
                <div class="messages">
                  <p class="msg" id="msg-0">
                    Olá! Sou o Atendimento Lightspeed e estou aqui para lhe auxiliar! O que deseja?
                  </p>
                </div>
                <span class="timestamp"><span class="posttime">3 minutos atrás</span></span>
              </div>
            </div>
          </article>
          <article class="msg-container msg-self" id="msg-0">
            <div class="msg-box">
              <div class="flr">
                <div class="messages">
                  <p class="msg" id="msg-1">
                    Olá, eu gostaria de contratar um plano de minha internet.
                  </p>
                </div>
                <span class="timestamp"><span class="posttime">2 minutos atrás</span></span>
              </div>
              <img class="user-img" id="user-0" src="images/user.jpg" />
            </div>
          </article>
          <article class="msg-container msg-remote" id="msg-0">
            <div class="msg-box">
              <img class="user-img" id="user-0" src="images/icon site.png" />
              <div class="flr">
                <div class="messages">
                  <p class="msg" id="msg-0">
                    Muito bem! Acesse através dessa mensagem a nossa sessão de Planos no nosso site! Quais quer duvidas
                    estarei aqui :D .
                  </p>
                </div>
                <span class="timestamp"><span class="posttime">1 minuto atrás</span></span>
              </div>
            </div>
          </article>
          <article class="msg-container msg-remote" id="msg-0">
            <div class="msg-box">
              <img class="user-img" id="user-0" src="images/icon site.png" />
              <div class="flr">
                <div class="messages">
                  <a href="#planos">
                    <p class="msg msg-planos" id="msg-0">
                      PLANOS
                    </p>
                  </a>
                </div>
                <span class="timestamp"><span class="posttime">Agora</span></span>
              </div>
            </div>
          </article>
          <article class="msg-container msg-self" id="msg-0">
            <div class="msg-box">
              <div class="flr">
                <div class="messages">
                  <p class="msg" id="msg-1">
                    Ok. Obrigado!
                  </p>
                </div>
                <span class="timestamp"><span class="posttime">Agora</span></span>
              </div>
              <img class="user-img" id="user-0" src="images/user.jpg" />
            </div>
          </article>
        </section>
        <form class="chat-input" onsubmit="return false;">
          <input type="text" autocomplete="on" placeholder="Escreva uma mensagem..." />
          <button>
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
              <path fill="rgba(0,0,0,.38)" d="M17,12L12,17V14H8V10H12V7L17,12M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L5,8.09V15.91L12,19.85L19,15.91V8.09L12,4.15Z" />
            </svg>
          </button>
        </form>
      </div>
    </div>
  </div>
  <!-- CHAT FLUTUANTE termina  -->
  <!-------------------------------------------------------->
  <!-- HEADER/TOPO INICIA  -->
  <header class="header">
    <img class="header-logo-lightspeed" src="images/logo_header.png">
    <nav class="header-menu-1">
      <div class="menu-item-header">
        <a href="#sobrenos" class="header-menu-item-1">Sobre nós</a>
      </div>
      <div class="menu-item-header">
        <a href="#contato" class="header-menu-item-1">Contato</a>
      </div>
      <div class="menu-item-header">
        <a href="#planos" class="header-menu-item-1">Planos</a>
      </div>
      <div class="menu-item-header">
        <a href="#conteudo-1-2" class="header-menu-item-1">Produtos</a>
      </div>
      <?php include('botaologin.php'); ?>
    </nav>
  </header>
  <!-- HEADER/TOPO TERMINA  -->
  <!-- CONTEUDO 1 - SATELITES INICIA  -->
  <main class="conteudo-1 conteudo-margin">
    <section class="conteudo-principal">
      <div class="conteudo-satelite-texto">
        <h1 class="conteudo-satelite-texto-titulo">Satélites</h1>
        <h2 class="conteudo-satelite-texto-subtitulo">Conheça nossos satélites ao redor do mundo!</h2>
        <div class="conteudo-satelite-info">
          <h2 class="conteudo-satelite-titulo">Curiosidades sobre satélites:</h2>
          <div class="conteudo-satelite-paragrafos">
            <p class="conteudo-satelite-paragrafo"> <strong>•</strong> Leva o acesso a internet á praticamente
              <strong>qualquer lugar</strong>
            </p>
            <p class="conteudo-satelite-paragrafo"><strong>•</strong> <strong>Não</strong> te deixa na mão sem sinal</p>
            <p class="conteudo-satelite-paragrafo"><strong>•</strong> Te fornece <strong>beneficios</strong> que
              <strong>só a Lightspeed</strong> pode oferecer
            </p>
          </div>
        </div>
      </div>
      <div class="conteudo-satelite">
        <img class="conteudo-satelite-imagem" src="images/sat_c3po.png" alt="Satelite C3PO">
      </div>
    </section>
  </main>
  <!-- CONTEUDO 1 - SATELITES TERMINA  -->
  <!-- CONTEUDO 1.2 - SMARTPHONE INICIA  -->
  <main id="conteudo-1-2" class="conteudo-1-2">
    <div data-aos="fade-right" class="conteudo-smartphone">
      <div class="blocagem">
        <div class="bloco-direitoo">
          <div class="smartphone-img">
            <img class="slides slides-hidden" src="image1.webp">
            <img class="slides slides-hidden" src="image2.webp">
            <img class="slides slides-hidden" src="image3.webp">
            <img class="slides slides-hidden" src="image4.webp">
            <img class="slides slides-hidden" src="image5.webp">
          </div>
        </div>
        <div class="bloco-esquerdoo">
          <div class="text-box">
            <h2 class="titulo"> <i class="fa-solid fa-bolt" style="color: white; font-size: 3rem;"></i> Smartphone HARE II</h2>
            <span class="legenda">O dispositivo inteligente inovador da Lightspeed, com uma conectividade avançada feita para se conectar com a internet via satélite e suportar a alta-velocidade que proporcionamos em nossos serviços. Com 5G que permite uma estável navegação na internet, e com memoria interna de 256gb. Mas o ponto principal que torna o Hare II ser único é sua capacidade avançada de download 1000Mbps</span>
            <div class="div-botao-adquiraja">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- CONTEUDO 1.2 - SMARTPHONE TERMINA  -->
  <!-- CONTEUDO 1.2 - CHIP INICIA  -->
  <main class="conteudo-1-2">
    <div data-aos="fade-left" class="conteudo-smartphone">
      <div class="blocagem">
        <div class="bloco-esquerdoo">
          <div class="text-box">
            <h2 class="titulo"> <i class="fa-solid fa-bolt" style="color: white; font-size: 3rem;"></i> Chip Lightspeed</h2>
            <span class="legenda">Responsável por armazenar seu numero, senha pessoal (PIN), agenda, SMS's e adicionais do serviço Light Speed. Sua segurança e alta velocidade está garantida aqui.</span>
            <br>
            <span class="legenda">(O Chip Lightspeed é um beneficio gratuito para todos os planos, porém pode ser adquirido separadamente.)</span>
            <div class="div-botao-adquiraja">
              
            </div>
          </div>
        </div>
        <div class="bloco-direitoo">
          <div class="smartphone-img">
            <img class="chip" src="images/chip.png">
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- CONTEUDO 1.2 - CHIP TERMINA  -->
  <!-- CONTEUDO 1.2 - ROTEADOR E ANTENA INICIA  -->
  <main class="conteudo-1-2">
    <div data-aos="fade-right" class="conteudo-smartphone">
      <div class="blocagem">
        <div class="bloco-direitoo">
          <div class="smartphone-img">
            <img class="antena-e-roteador" src="images/ANTENA E ROTEADOR.png">
          </div>
        </div>
        <div class="bloco-esquerdoo">
          <div class="text-box">
            <h2 class="titulo"> <i class="fa-solid fa-bolt" style="color: white; font-size: 3rem;"></i> Antena e Roteador</h2>
            <span class="legenda">Nossos equipamentos principais para a instalação e funcionamento da Lightspeed em sua localidade!</span>
            <br>
            <span class="legenda">(O preço de instalação pode variar de acordo com o plano escolhido.)</span>
            <div class="div-botao-adquiraja">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- CONTEUDO 1.2 - ROTEADOR E ANTENA TERMINA  -->
  <!-- CONTEUDO 2 - PLANOS INICIA  -->
  <main class="conteudo-2 conteudo-margin">
    <section class="planos" id="planos">
      <h1 data-aos="fade-left" class="planos-heading"> NOSSOS PLANOS </h1>
      <div data-aos="fade-right" class="planos-box-container">
        <div class="planos-box planobox1">
          <h3 class="planos-titulo"> <i class="fa-solid fa-house"></i> Residencial</h3>
          <div class="planos-valor">R$259,90<span>/mês</span></div>
          <ul>
            <li> Ideal para pessoas que adoram passar horas jogando ou maratonando séries sem intervenções externas. </li>
            <br>
            <li> <i class="fas fa-money-bill"></i> <span>Taxa de R$2.000 de instalação</span> </li>
          </ul>
          <?php include('botao-assina-residencial.php'); ?>
        </div>
        <div class="planos-box planobox2">
          <h3 class="planos-titulo"> <i class="fa-solid fa-briefcase"></i> Business</h3>
          <div class="planos-valor">R$1.000<span>/mês</span></div>
          <div class="preco-minimo">
            <span>Preço base.</span>
          </div>
          <ul>
            <li> Criado para sustentar a demanda de empresas que buscam uma alta qualidade e estabilidade de internet. </li>
            <br>
            <li> <i class="fas fa-money-bill"></i> <span>Taxa de instalação a calcular</span> </li>
          </ul>
          <?php include('botao-assina-business.php'); ?>
        </div>
        <div class="planos-box planobox3">
          <h3 class="planos-titulo"> <i class="fa-solid fa-earth-americas"></i> NÔMADE</h3>
          <div class="planos-valor">R$159,90<span>/mês</span></div>
          <ul>
            <li> Designado para viajantes que exploram o mundo a fora e desejam ter uma conexão em qualquer lugar.</li>
            <br>
            <li> <i class="fas fa-money-bill"></i> <span>Taxa de instalação a calcular</span> </li>
          </ul>
          <?php include('botao-assina-nomade.php'); ?>
        </div>
        <div class="planos-box planobox4">
          <h3 class="planos-titulo"> <i class="fa-solid fa-anchor"></i></i> Náutica</h3>
          <div class="planos-valor">R$199,90<span>/mês</span></div>
          <ul>
            <li> Destinado a atender ás necessidades de quem vive em instalações de cargueiros ou vive sua vida em alto mar.</li>
            <br>
            <li> <i class="fas fa-money-bill"></i> <span>Taxa de instalação a calcular</span> </li>
          </ul>
          <?php include('botao-assina-nautica.php'); ?>
        </div>
      </div>
    </section>
  </main>
  <!-- CONTEUDO 2 - PLANOS TERMINA  -->
  <!-- CONTEUDO 2.5 - QUALIDADES INICIA  -->
  <main class="conteudo-2dot5">
    <div class="qualidades-area">
      <div data-aos="fade-left" class="qualidades-itens">
        <div class="qualidades-itens-item">
          <div class="qualidades-itens-item-imagem">
            <img src="images/quality-1.png">
          </div>
          <div class="qualidades-itens-item-texto">
            <p> &mdash; baixa latência &mdash;</p>
            <span>assista suas séries sem esperar o carregamento, jogue sem se preocupar com ping alto.</span>
          </div>
        </div>
        <div class="qualidades-itens-item">
          <div class="qualidades-itens-item-imagem">
            <img src="images/quality-2.png">
          </div>
          <div class="qualidades-itens-item-texto">
            <p> &mdash; alta velocidade &mdash; </p>
            <span>baixe o que quiser em instantes os mais de 200 Mbps de velocidade da Lightspeed.</span>
          </div>
        </div>
        <div class="qualidades-itens-item">
          <div class="qualidades-itens-item-imagem">
            <img src="images/quality-3.png">
          </div>
          <div class="qualidades-itens-item-texto">
            <p> &mdash; sem instabilidade &mdash; </p>
            <span>dias chuvosos? tempo nublado? nada disso é problema. nossa estabilidade é garantida.</span>
          </div>
        </div>
        <div class="qualidades-itens-item">
          <div class="qualidades-itens-item-imagem">
            <img src="images/quality-4.png">
          </div>
          <div class="qualidades-itens-item-texto">
            <p> &mdash; atendimento veloz &mdash; </p>
            <span>na necessidade de contatar o suporte, nossa equipe irá te responder em menos de 10 minutos.</span>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- CONTEUDO 2.5 - QUALIDADES termina  -->
  <!-- CONTEUDO 3 - NOSSA EQUIPE INICIA  -->
  <main class="conteudo-3 conteudo-margin">
    <div class="wrapper">
      <h1 data-aos="fade-right" class="equipe-heading"> NOSSA EQUIPE </h1>
      <div data-aos="fade-left" class="our_team">
        <div class="team_member">
          <div class="member_img">
            <img src="images/member_1.png" alt="our_team">
            <div class="social_media">
              <div class="facebook item"><i class="fab fa-facebook-f"></i></div>
              <div class="twitter item"><i class="fab fa-twitter"></i></div>
              <div class="instagram item"><i class="fab fa-instagram"></i></div>
            </div>
          </div>
          <h3>eduardo barbosa</h3>
          <span>CEO</span>
          <p> Responsavel gerenciar a organização e atuar como ponto central de comunicação entre o operacional e o conselho de administração.</p>
        </div>
        <div class="team_member">
          <div class="member_img">
            <img src="images/member_4.png" alt="our_team">
            <div class="social_media">
              <div class="facebook item"><i class="fab fa-facebook-f"></i></div>
              <div class="twitter item"><i class="fab fa-twitter"></i></div>
              <div class="instagram item"><i class="fab fa-instagram"></i></div>
            </div>
          </div>
          <h3>Lavínia Ferreira</h3>
          <span>COO</span>
          <p>Auxilia o CEO á acompanhar mais de perto a rotina operacional da empresa. É sua função garantir a produtividade e a gestão adequada dos recursos.</p>
        </div>
        <div class="team_member">
          <div class="member_img">
            <img src="images/member_2.png" alt="our_team">
            <div class="social_media">
              <div class="facebook item"><i class="fab fa-facebook-f"></i></div>
              <div class="twitter item"><i class="fab fa-twitter"></i></div>
              <div class="instagram item"><i class="fab fa-instagram"></i></div>
            </div>
          </div>
          <h3>maria eduarda</h3>
          <span>Analista de Sistemas</span>
          <p>Responsável pela captura das regras de negócio, dos requisitos de sistema e documentos de apoio ao desenvolvimento.</p>
        </div>
        <div class="team_member">
          <div class="member_img">
            <img src="images/member_3.png" alt="our_team">
            <div class="social_media">
              <div class="facebook item"><i class="fab fa-facebook-f"></i></div>
              <div class="twitter item"><i class="fab fa-twitter"></i></div>
              <div class="instagram item"><i class="fab fa-instagram"></i></div>
            </div>
          </div>
          <h3>Kauã Krysthoffer</h3>
          <span>Diretor de Marketing</span>
          <p>Desenvolve estratégias de marketing e identidade visual. Define canais de comunicação específicos, exclusivos e adequados para cada público.</p>
        </div>
        <div class="team_member">
          <div class="member_img">
            <img src="images/member_5.png" alt="our_team">
            <div class="social_media">
              <div class="facebook item"><i class="fab fa-facebook-f"></i></div>
              <div class="twitter item"><i class="fab fa-twitter"></i></div>
              <div class="instagram item"><i class="fab fa-instagram"></i></div>
            </div>
          </div>
          <h3>João Manuel</h3>
          <span>Designer</span>
          <p>Responsável por desenvolver todo o processo de definir requisitos e criar elementos visuais, incluindo ilustrações, logotipos, layouts e fotos.</p>
        </div>
        <div class="team_member">
          <div class="member_img">
            <img src="images/member_6.png" alt="our_team">
            <div class="social_media">
              <div class="facebook item"><i class="fab fa-facebook-f"></i></div>
              <div class="twitter item"><i class="fab fa-twitter"></i></div>
              <div class="instagram item"><i class="fab fa-instagram"></i></div>
            </div>
          </div>
          <h3>João Henrique</h3>
          <span>Diretor de T.I.</span>
          <p>O título de executivo atribuído a ele lhe confere a responsabilidade por todas as atividades que tenham relação com as soluções e recursos de computação.</p>
        </div>
        <div class="team_member">
          <div class="member_img">
            <img src="images/member_7.png" alt="our_team">
            <div class="social_media">
              <div class="facebook item"><i class="fab fa-facebook-f"></i></div>
              <div class="twitter item"><i class="fab fa-twitter"></i></div>
              <div class="instagram item"><i class="fab fa-instagram"></i></div>
            </div>
          </div>
          <h3>Marcos Jardim</h3>
          <span>Diretor financeiro</span>
          <p>Gerencia os departamentos contábeis e financeiros, desenvolvendo normas internas, processos e procedimentos de finanças.</p>
        </div>
      </div>
    </div>
  </main>
  <!-- CONTEUDO 3 - NOSSA EQUIPE TERMINA  -->
  <!-- CONTEUDO 4 - SOBRE NÓS INICIA  -->
  <main id="sobrenos" class="conteudo-4 conteudo-margin">
    <div class="wrapper">
      <h1 data-aos="fade-right" class="sobrenos-heading"> SOBRE NÓS </h1>
      <div class="sobrenos-conteudo">
        <div class="sobrenos-caixa sobrenos-imagem">
          <img src="images/satelite-ilustracao.png">
        </div>
        <div class="sobrenos-caixa sobrenos-texto">
          <h1>QUEM SOMOS?</h1>
          <h2>NÓS SOMOS A LIGHTSPEED!</h2>
          <p>Uma empresa séria e focada, pioneira no serviço de internet via satélite. Nosso objetivo é levar a conexão
            à internet a áreas remotas e de difícil acesso. Com isso surge a Lightspeed e sua proposta ambiciosa e
            desafiadora de alcançar o que parecia ser inalcançável.</p>
          <span class="listinha-sobrenos"> <img src="images/icon site.png"> SERVIÇO DE QUALIDADE</span>
          <span class="listinha-sobrenos"> <img src="images/icon site.png"> MENSALIDADES QUE CABEM NO SEU BOLSO</span>
          <span class="listinha-sobrenos"> <img src="images/icon site.png"> SEMPRE BEM AVALIADOS</span>
          <div class="bubble-bg">
            <img src="images/bubble-bg.png">
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- CONTEUDO 4 - SOBRE NÓS TERMINA  -->
  <div class="contato" id="contato">
    <div class="formulario">
      <div class="header">
        <div data-aos="fade-right" class="titulo">
          <h2>CONTATO</h2>
        </div>
      </div>
      <form action="https://formspree.io/f/xdojvgdr" method="POST" style="color: white;">
        <div class="conteudo-form">
          <div data-aos="fade-right" class="opcao-input">
            <!--<b>Seu email:</b>---->
            <input placeholder="Nome *" class="contato-input" type="text" name="email" required>
          </div>
          <div data-aos="fade-right" class="opcao-input">
            <!--<b>Seu email:</b>---->
            <input placeholder="E-mail *" class="contato-input" type="email" name="email" required>
          </div>
          <div data-aos="fade-right" class="opcao-input">
            <!--<b>Seu assunto:</b>---->
            <input placeholder="Assunto *" class="contato-input" name="assunto" required>
          </div>
          <div data-aos="fade-right" class="opcao-input input-mensagem">
            <!---<b>Sua mensagem:</b>--->
            <textarea placeholder="Mensagem *" rows="5" cols="61" class="contato-input-mensagem" name="mensagem" required></textarea>
          </div>
          <!-- your other form fields go here -->
          <button data-aos="fade-right" class="enviar-form" type="submit"><b>ENVIAR</b></button>
        </div>
      </form>
    </div>
  </div>
  <!-- FOOTER INICIA  -->
  <footer class="rodape">
    <div class="rodape-coisas">
      <img class="rodape-logo-lightspeed" src="images/logo_header_black.png" alt="Logo do Lightspeed FOOTER">
      <div class="rodape-itens-sociais">
        &mdash;
        <a href="index.html" class="social-icons"><i class="fa-brands fa-instagram"></i></a>
        <a href="index.html" class="social-icons"><i class="fa-brands fa-facebook"></i></a>
        <a href="index.html" class="social-icons"><i class="fa-brands fa-linkedin"></i></a>
        &mdash;
      </div>
      <p> &copy; 2022 Copyright - Lightspeed</p>
    </div>
  </footer>
  <!-- FOOTER TERMINA  -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000
    });
  </script>
  <script>
    addEventListener("load", () => { // "load" is safe but "DOMContentLoaded" starts earlier
      var index = 0;
      const slides = document.querySelectorAll(".slides");
      const classHide = "slides-hidden",
        count = slides.length;
      nextSlide();

      function nextSlide() {
        slides[(index++) % count].classList.add(classHide);
        slides[index % count].classList.remove(classHide);
        setTimeout(nextSlide, 1000);
      }
    });
  </script>
  <script src="js/script.js"></script>
  <script src="js/pagamentos.js"></script>
  <script src="js/chat-flutuante.js"></script>
  <script src="js/modal-login-flutuante.js"></script>
  <script src="js/modal-painel-flutuante.js"></script>
  <script src="js/modal-cadastro-flutuante.js"></script>
  <script src="js/jquery-3.6.1.js"></script>
</body>

</html>