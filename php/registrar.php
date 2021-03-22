<?php

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$sexo = $_POST['sexo'];
$cep = $_POST['cep'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$logradouro = $_POST['logradouro'];
$estado = $_POST['estado'];
$complemento = $_POST['complemento'];
$senha = MD5($_POST['senha']);

$connect = mysqli_connect('sql103.epizy.com','epiz_28085125','1DPXttyY2au3m', 'epiz_28085125_loja');
$query_select = "SELECT cpf FROM usuarios WHERE cpf = '$cpf'";
$select = mysqli_query($connect, $query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['cpf'];


if($logarray == $cpf){

echo"<script language='javascript' type='text/javascript'>
alert('Esse login já existe');window.location.href='
../cadastro.html';</script>";
die();

}else{
$query = "INSERT INTO usuarios VALUES ('$nome', '$cpf', '$telefone', '$sexo', '$cep', '$bairro', '$cidade', '$logradouro', '$estado', '$complemento', '$senha')";
$insert = mysqli_query($connect, $query);

if($insert){
  echo"<script language='javascript' type='text/javascript'>
  alert('Usuário cadastrado com sucesso!');window.location.
  href='../login.html'</script>";
}else{
  echo"<script language='javascript' type='text/javascript'>
  alert('Não foi possível cadastrar esse usuário');window.location
  .href='../cadastro.html'</script>";
}
}
?>