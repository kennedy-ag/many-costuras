<?php
$cpf = $_POST['cpf'];
$senha = md5($_POST['senha']);
$entrar = $_POST['entrar'];

$connect = mysqli_connect('sql103.epizy.com','epiz_28085125','1DPXttyY2au3m', 'epiz_28085125_loja');
  if (isset($entrar)) {

    $verifica = mysqli_query($connect, "SELECT * FROM usuarios WHERE cpf =
    '$cpf' AND senha = '$senha'") or die("Erro ao selecionar");
      if (mysqli_num_rows($verifica)<=0){
        echo"<scripttype='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='../login.html';</script>";
        header('location:../index.php');
      }else{
        setcookie('cpf', $cpf, time()+3600*24, '/');
        header("Location:../index.php");
      }
  }
?>