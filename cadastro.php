<?php  

$email = $_POST['email-cadastro'];
$senha = $_POST['senha-cadastro'];
$nome =  $_POST['nome-cadastro'];
$sobrenome =  $_POST['sobrenome-cadastro'];




$connect = mysqli_connect('localhost','root','','lightspeeddb');
$db = mysqli_select_db($connect,'lightspeeddb');
$query_select = "SELECT email FROM usuarios WHERE email = '$email'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['email'];

  if($email == "" || $email == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo email deve ser preenchido');window.location.href='
    index.php';</script>";

    }else{
      if($logarray == $email){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse email já existe');window.location.href='
        index.php';</script>";
        die();

      }else{
        $query = "INSERT INTO usuarios (email,senha,nome,sobrenome) VALUES ('$email','$senha','$nome','$sobrenome')";
        $insert = mysqli_query($connect,$query);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='index.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='index.php'</script>";
        }
      }
    }

    ?>