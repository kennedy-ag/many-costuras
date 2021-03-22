<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">

		<title>Contato</title>
	</head>
	<body>
		

		<nav class="navbar navbar-expand-lg navbar-primary bg-light fixed-top">
		  <div class="container-fluid">
		    <a class="navbar-brand text-dark" href="index.php">Many Costuras</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		        <li class="nav-item mx-2">
		          <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home"></i> Home</a>
		        </li>
		        <li class="nav-item mx-2">
		          <a class="nav-link active" target="_blank" href="https://api.whatsapp.com/send?phone=5561986592066&text=Ol%C3%A1!"><i class="fa fa-phone"></i> Whatsapp</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>


		<div class="container-fluid" style="background-color: #5794f7">
			<div class="p-4"></div>
			<div id="contato" class="container p-4 rounded">
				<h1>Contato</h1>
				<hr>
				<form class="row g-3" method="POST" action="php/contato.php">
				  <div class="col-md-5">
				    <label for="inputEmail4" class="form-label"><i class="fa fa-envelope"></i> E-mail</label>
				    <input type="email" class="form-control" id="inputEmail4">
				  </div>
				  <div class="col-md-4">
				    <label for="inputName" class="form-label"><i class="fa fa-user"></i> Nome</label>
				    <input type="text" class="form-control" id="inputName">
				  </div>
				  <div class="col-md-3">
				    <label for="inputState" class="form-label"><i class="fa fa-list"></i> Tipo de envio</label>
				    <select id="inputState" class="form-select">
				      <option selected>Outros</option>
				      <option value="Elogio">Elogio</option>
				      <option value="Reclamacao">Reclamação</option>
				      <option value="Sugestao">Sugestão</option>
				      <option value="Duvidas">Dúvidas</option>
				    </select>
				  </div>
				  <label for="floatingTextarea"></i><i class="far fa-comment-alt"></i> Mensagem:</label>
				  <textarea class="form-control" placeholder="Digite sua mensagem..." id="floatingTextarea" rows="6"></textarea>
				  <div class="col-12">
				    <button type="submit" class="btn btn-primary">Enviar</button>
				  </div>
				</form>
				<div class="py-4"></div>
			</div>
			<div class="p-4"></div>
		</div>


		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>
	</body>
</html>