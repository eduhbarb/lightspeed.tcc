<?php
    session_start();
    // print_r($_REQUEST);
    if(isset($_POST['submit_login']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        // Acessa
        include_once('conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // print_r('Email: ' . $email);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);

        //Comando que puxa todos os dados onde o email e a senha forem iguais
        $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
        //Envia o comando para o arquivo de conexao sql
        $result = $conexao->query($sql);
        //Crio uma arrai com as informações que eu quero receber
        $usuario = array();
        //Faço um enquanto que puxa pra mim todas as informações que o SQL me retornar
        while ($row = mysqli_fetch_assoc($result)) { 
            //Essas informações irão para o array $usuario
            $usuario[] = $row;
            //Filtro essas informações e as separo em variaveis.
            $nome = $row['nome'];
            $sobrenome = $row['sobrenome'];
            $endereco = $row['endereco'];
            $plano = $row['plano'];
            $adicional_um = $row['adicional_um'];
          }

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            unset($_SESSION['nome']);
            unset($_SESSION['sobrenome']);
            unset($_SESSION['plano']);
            unset($_SESSION['endereco']);
            unset($_SESSION['adicional_um']);
            header('Location: index.php');
        }
        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['nome'] = $nome;
            $_SESSION['sobrenome'] = $sobrenome;
            $_SESSION['plano'] = $plano;
            $_SESSION['endereco'] = $endereco;
            $_SESSION['adicional_um'] = $adicional_um;
            header('Location: index.php');
        }
    }
    else
    {
        // Não acessa
        header('Location: index.php');
    }
