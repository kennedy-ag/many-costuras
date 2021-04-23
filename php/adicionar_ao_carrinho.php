<?php
	if(isset($_COOKIE['cpf'])){
	  	$login_cookie = $_COOKIE['cpf'];
	  	$id = $_GET['p'];

		$connect = mysqli_connect('localhost','root','', 'loja');
		$verifica = mysqli_query($connect, "SELECT * FROM carrinho WHERE produto_id =
		'$id' AND user_id = '$login_cookie'") or die("Erro ao selecionar");

		if (mysqli_num_rows($verifica)<=0){
			$query = "INSERT INTO carrinho VALUES ('default', '$id', '$login_cookie')";
			$insert = mysqli_query($connect, $query);

			if($insert){
			  echo"<script language='javascript' type='text/javascript'>
			  alert('Produto adicionado com sucesso!');window.location.
			  href='../carrinho.php'</script>";
			}else{
			  echo"<script language='javascript' type='text/javascript'>
			  alert('Não foi possível adicionar este produto');window.location
			  .href='../index.php'</script>";
			}

		}else{
			echo "<h3>O produto já está no carrinho!</h3>
			<br><a href='../index.php'>Continuar comprando</a>";
		}

	} else {
		echo "<h2>Você precisa estar logado para adicionar produtos ao carrinho!</h2>
		<br><a href='../index.php'>Voltar à página inicial</a>";
	}
?>