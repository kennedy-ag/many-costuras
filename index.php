<?php
	$conn = new PDO('mysql:host=localhost;dbname=loja', 'root', '');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(isset($_COOKIE['cpf'])){
  	$login_cookie = $_COOKIE['cpf'];
  	$connect = mysqli_connect('localhost','root','', 'loja');
		$verifica = mysqli_query($connect, "SELECT * FROM carrinho WHERE user_id = '$login_cookie'") or die("Erro ao selecionar");
		$quantidade = mysqli_num_rows($verifica);
	}
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">

		<title>Loja</title>
	</head>
	<body>
		

		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#">Many Costuras</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">


	      	<?php 
          	if(isset($login_cookie)){echo"
		      	<li class='nav-item mx-2'>
		          <a class='nav-link active text-primary' href='perfil.php'><i class='fa fa-user'></i> {$login_cookie}</a>
		        </li>
		        <li class='nav-item mx-2'>
		          <a class='nav-link active text-primary' href='carrinho.php'><i class='fa fa-shopping-cart'></i> Carrinho <span class='badge rounded-pill bg-primary'>$quantidade</span></a>
		        </li>
		      ";}else{
		      	echo "
		      	<li class='nav-item mx-2'>
		          <a class='nav-link active text-primary' href='login.html'><i class='fa fa-sign-in-alt'></i> Entrar</a>
		        </li>
		      	";
		      }?>

		        <li class="nav-item mx-2">
		          <a class="nav-link active text-primary" href="contato.php"><i class="fa fa-phone"></i> Contato</a>
		        </li>

		        <?php 
	          	if(isset($login_cookie)){echo"
			      	<li class='nav-item mx-2'>
			          <a class='nav-link active text-primary' href='php/logout.php'><i class='fa fa-sign-out-alt'></i> Sair</a>
			        </li>
			      ";}?>
		      </ul>
		      <form class="d-flex">
		        <input class="form-control me-2" list="query_results" type="search" placeholder="Buscar" aria-label="Buscar">
		        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
		      </form>


		      <datalist id="query_results">
						<option value="Bolsa">
						<option value="Máscara">
						<option value="Protetor de porta">
						<option value="Decoração">
						<option value="Mochila">
					</datalist>


		    </div>
		  </div>
		</nav>


		<div id="indicadores" class="carousel slide" data-bs-ride="carousel">
		  <div class="carousel-indicators">
		    <button type="button" data-bs-target="#indicadores" data-bs-slide-to="0" class="active" aria-current="true"></button>
		    <button type="button" data-bs-target="#indicadores" data-bs-slide-to="1"></button>
		    <button type="button" data-bs-target="#indicadores" data-bs-slide-to="2"></button>
		  </div>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="img/carrossel_1.jpg" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="img/carrossel_2.jpg" class="d-block w-100" alt="...">
		    </div>
		    <div class="carousel-item">
		      <img src="img/carrossel_3.jpg" class="d-block w-100" alt="...">
		    </div>
		  </div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#indicadores"  data-bs-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#indicadores"  data-bs-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Next</span>
		  </button>
		</div>


		<div class="container-fluid">
		  <div class="row">
		    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
		      <div class="position-sticky pt-3">

		        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
		          <span>Categorias</span>
		        </h6>
		        <hr>
		        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<button class="nav-link active" data-bs-toggle="pill" data-bs-target="#pill-necessaire" type="button" role="tab" aria-selected="true">Necessàires</button>
							<button class="nav-link" data-bs-toggle="pill" data-bs-target="#pill-protetor" type="button" role="tab" aria-selected="false">Protetores de porta</buttona>
							<button class="nav-link" data-bs-toggle="pill" data-bs-target="#pill-lacinho" type="button" role="tab" aria-selected="false">Lacinhos</button>
							<button class="nav-link" data-bs-toggle="pill" data-bs-target="#pill-mochila" type="button" role="tab" aria-selected="false">Mochilas</button>
							<button class="nav-link" data-bs-toggle="pill" data-bs-target="#pill-todos" type="button" role="tab" aria-selected="false">Todos os produtos</button>
						</div>
		        <hr>
		      </div>
		    </nav>

		    <div class="col-md-9 col-lg-10 d-md-block p-5">


		    	<div class="tab-content">
				    <div class="tab-pane fade show active" id="pill-necessaire" role="tabpanel">
				    	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
				        <?php
									try {
								    $consulta = $conn->query("SELECT id, nome, descricao, preco, link_imagem FROM produtos where categoria='bolsa';");

								    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
		                  echo "
		                  	<div class='col'>
								          <div class='card shadow-lg'>
								            <img class='bd-placeholder-img card-img-top' src='img/{$linha['link_imagem']}'>

								            <div class='card-body'>
								              <h5 class='card-title'>{$linha['nome']}</h5>
								              <hr>
								              <p>{$linha['descricao']}</p>
								              <p class='fw-bold text-primary fs-5 text-end me-4'>R$ {$linha['preco']}</p>
								              <hr>
								              <div class='btn-group'>
									              <a href='produto.php?p={$linha['id']}' class='btn btn-primary m-1'>Visualizar <i class='fa fa-eye'></i></a>
							              		<a href='php/adicionar_ao_carrinho.php?p={$linha['id']}' class='btn btn-outline-primary m-1'>Adicionar <i class='fa fa-shopping-cart'></i></a>
									             </div>
								            </div>
								          </div>
								        </div>
		                  ";
										}
									} catch(PDOException $e) {
									    echo 'ERROR: ' . $e->getMessage();
									}
						    ?>
				      </div>
				    </div>



				    <div class="tab-pane fade" id="pill-protetor" role="tabpanel">
			    		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
		    				<?php
									try {
								    $consulta = $conn->query("SELECT id, nome, descricao, preco, link_imagem FROM produtos where categoria='protetor';");

								    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
		                  echo "
		                  	<div class='col'>
								          <div class='card shadow-lg'>
								            <img class='bd-placeholder-img card-img-top' src='img/{$linha['link_imagem']}'>

								            <div class='card-body'>
								              <h5 class='card-title'>{$linha['nome']}</h5>
								              <hr>
								              <p>{$linha['descricao']}</p>
								              <p class='fw-bold text-primary fs-5 text-end me-4'>R$ {$linha['preco']}</p>
								              <hr>
								              <div class='btn-group'>
									              <a href='produto.php?p={$linha['id']}' class='btn btn-primary m-1'>Visualizar <i class='fa fa-eye'></i></a>
									              <a href='php/adicionar_ao_carrinho.php?p={$linha['id']}' class='btn btn-outline-primary m-1'>Adicionar <i class='fa fa-shopping-cart'></i></a>
									             </div>
								            </div>
								          </div>
								        </div>
		                  ";
										}
									} catch(PDOException $e) {
									    echo 'ERROR: ' . $e->getMessage();
									}
						    ?>
				      </div>
				    </div>



				    <div class="tab-pane fade" id="pill-lacinho" role="tabpanel">
				    	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
		    				<?php
									try {
								    $consulta = $conn->query("SELECT id, nome, descricao, preco, link_imagem FROM produtos where categoria='lacinho';");

								    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
		                  echo "
		                  	<div class='col'>
								          <div class='card shadow-lg'>
								            <img class='bd-placeholder-img card-img-top' src='img/{$linha['link_imagem']}'>

								            <div class='card-body'>
								              <h5 class='card-title'>{$linha['nome']}</h5>
								              <hr>
								              <p>{$linha['descricao']}</p>
								              <p class='fw-bold text-primary fs-5 text-end me-4'>R$ {$linha['preco']}</p>
								              <hr>
								              <div class='btn-group'>
									              <a href='produto.php?p={$linha['id']}' class='btn btn-primary m-1'>Visualizar <i class='fa fa-eye'></i></a>
									              <a href='php/adicionar_ao_carrinho.php?p={$linha['id']}' class='btn btn-outline-primary m-1'>Adicionar <i class='fa fa-shopping-cart'></i></a>
									             </div>
								            </div>
								          </div>
								        </div>
		                  ";
										}
									} catch(PDOException $e) {
									    echo 'ERROR: ' . $e->getMessage();
									}
						    ?>
				      </div>
				    </div>



				    <div class="tab-pane fade" id="pill-mochila" role="tabpanel">
				    	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
				    	<?php
								try {
							    $consulta = $conn->query("SELECT id, nome, descricao, preco, link_imagem FROM produtos where categoria='mochila';");

							    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	                  echo "
	                  	<div class='col'>
							          <div class='card shadow-lg'>
							            <img class='bd-placeholder-img card-img-top' src='img/{$linha['link_imagem']}'>

							            <div class='card-body'>
							              <h5 class='card-title'>{$linha['nome']}</h5>
							              <hr>
							              <p>{$linha['descricao']}</p>
							              <p class='fw-bold text-primary fs-5 text-end me-4'>R$ {$linha['preco']}</p>
							              <hr>
							              <div class='btn-group'>
								              <a href='produto.php?p={$linha['id']}' class='btn btn-primary m-1'>Visualizar <i class='fa fa-eye'></i></a>
								              <a href='php/adicionar_ao_carrinho.php?p={$linha['id']}' class='btn btn-outline-primary m-1'>Adicionar <i class='fa fa-shopping-cart'></i></a>
								             </div>
							            </div>
							          </div>
							        </div>
	                  ";
									}
								} catch(PDOException $e) {
								    echo 'ERROR: ' . $e->getMessage();
								}
					    ?>
				      </div>
				    </div>



				    <div class="tab-pane fade" id="pill-todos" role="tabpanel">
				    	<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
				        <?php
									try {
								    $consulta = $conn->query("SELECT id, nome, descricao, preco, link_imagem FROM produtos;");

								    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
		                  echo "
		                  	<div class='col'>
								          <div class='card shadow-lg'>
								            <img class='bd-placeholder-img card-img-top' src='img/{$linha['link_imagem']}'>

								            <div class='card-body'>
								              <h5 class='card-title'>{$linha['nome']}</h5>
								              <hr>
								              <p>{$linha['descricao']}</p>
								              <p class='fw-bold text-primary fs-5 text-end me-4'>R$ {$linha['preco']}</p>
								              <hr>
								              <div class='btn-group'>
									              <a href='produto.php?p={$linha['id']}' class='btn btn-primary m-1'>Visualizar <i class='fa fa-eye'></i></a>
									              <a href='php/adicionar_ao_carrinho.php?p={$linha['id']}' class='btn btn-outline-primary m-1'>Adicionar <i class='fa fa-shopping-cart'></i></a>
									             </div>
								            </div>
								          </div>
								        </div>
		                  ";
										}
									} catch(PDOException $e) {
									    echo 'ERROR: ' . $e->getMessage();
									}
						    ?>
				      </div>
				    </div>
				  </div>


		    	
		    </div>
		    <div class="p-5"></div>
		  </div>
		</div>


		<a id="back-to-top" href="#">^</a>


		<footer id="rodape">
			<div class="bg-dark p-4">
				<p class="text-center text-light">Copyright &copy; 2021 - Kennedy Viana Aguiar. Todos os direitos reservados.</p>
			</div>
		</footer>


		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>
		<script type="text/javascript">
      jQuery(document).ready(function(){
        jQuery("#back-to-top").hide();
        jQuery('a#back-to-top').click(function(){
          jQuery('body,html').animate({
            scrollTop: 0
          }, 800);
          return false;
        });
        jQuery(window).scroll(function(){
          if(jQuery(this).scrollTop()>400){
            jQuery('#back-to-top').fadeIn();
          } else {
            jQuery('#back-to-top').fadeOut();
          }
        });
      });
    </script>
	</body>
</html>