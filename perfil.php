<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">

		<title>Perfil</title>
	</head>
	<body>
		

		<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top shadow-lg">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="index.php">Many Costuras</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		        <li class="nav-item mx-2">
		          <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home"></i> Home</a>
		        </li>
		        <li class="nav-item mx-2">
		          <a class="nav-link active" href="contato.php"><i class="fa fa-phone"></i> Contato</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>


		<div class="p-3"></div>

		<?php
		try {
		$conn = new PDO('mysql:host=sql103.epizy.com;dbname=epiz_28085125_loja', 'epiz_28085125', '1DPXttyY2au3m');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$consulta = $conn->query("SELECT * FROM usuarios where cpf='{$_COOKIE['cpf']}';");

		while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
		echo "
			<div class='container bg-light rounded p-4'>
				<h2>Perfil: {$linha['nome']}</h2>
				<hr>
				<div class='m-5'>
					<p><strong>CPF: </strong>{$linha['cpf']}</p>
					<p><strong>Endereço: </strong>{$linha['logradouro']}, {$linha['bairro']} - {$linha['cidade']} - {$linha['estado']}</p>
					<p><strong>CEP: </strong>{$linha['cep']}</p>
					<p><strong>Referência: </strong>{$linha['complemento']}</p>
					<p><strong>Sexo: </strong>{$linha['sexo']}</p>
					<p><strong>Telefone: </strong>{$linha['telefone']}</p>
				</div>
			</div>
		";
			}
		} catch(PDOException $e) {
		    echo 'ERROR: ' . $e->getMessage();
		}
		?>


		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>
	</body>
</html>