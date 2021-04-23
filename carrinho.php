<?php
	$conn = new PDO('mysql:host=localhost;dbname=loja', 'root', '');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(isset($_COOKIE['cpf'])){
  	$login_cookie = $_COOKIE['cpf'];
	} else {
		header("Location:index.php");
	}
?>
<?php
	$connect = mysqli_connect('localhost','root','', 'loja');
	$verifica = mysqli_query($connect, "SELECT * FROM carrinho WHERE user_id = '$login_cookie'") or die("Erro ao selecionar");
	$quantidade = mysqli_num_rows($verifica);
	$total = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<title>Carrinho</title>
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


		<div class="container-fluid bg-light">
			<h1 class="p-3">Carrinho de compras</h1>
			<hr>



			<div class="p-3"></div>
			<div class="row">

				<div class="col-md-9">
					<div id="carrinho" class="py-3 px-5 rounded mx-auto">
						<?php
							try {
						    $consulta = $conn->query("SELECT * FROM carrinho WHERE user_id='$login_cookie';");

						    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
						    	$consulta2 = $conn->query("SELECT * FROM produtos WHERE id={$linha['produto_id']};");
						    	$linha2 = $consulta2->fetch(PDO::FETCH_ASSOC);
						    	$total += $linha2['preco'];
                  echo "
                  	<div class='bg-light row p-2 mb-3 shadow-sm'>
											<div class='col-md-3'>
												<a href='produto.php?p={$linha2['id']}'><img class='img-fluid' src='img/{$linha2['link_imagem']}'></a>
											</div>
											<div class='col-md-8 px-4'>
												<p class='fw-bold'>{$linha2['nome']}</p>
												<hr>
												<p>{$linha2['descricao']}</p>
											</div>
											<div class='align-self-center precos col-md-1 rounded'>
												<p class='fw-bolder text-center'>R$ {$linha2['preco']}</p>
											</div>
											<hr>
											<a href='php/remover_do_carrinho.php?p={$linha2['id']}' class='text-end text-decoration-none'><i class='fas fa-times'></i> Remover</a>
										</div>
                  ";
								}
							} catch(PDOException $e) {
							    echo 'ERROR: ' . $e->getMessage();
							}
						?>

					</div>
				</div>


				<div class="col-md-3">
					<div id="cart_info" class="m-4 p-4 rounded">
						<h3>Carrinho</h3>
						<hr>
						<p><strong>Total de produtos: </strong><?php echo "$quantidade"; ?></p>
						<p><strong>Valor total: </strong>R$ <?php echo "$total"; ?></p>
						<a href='#' class='btn btn-primary d-flex ms-auto my-3'>Pagar com boleto</a>
						<a href='#' class='btn btn-primary d-flex ms-auto my-3'>Pagar com PIX</a>
					</div>
				</div>


			</div>
			<div class="p-3"></div>
		</div>


		<a id="back-to-top" href="#">^</a>


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