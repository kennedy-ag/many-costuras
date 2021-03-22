<?php
	$conn = new PDO('mysql:host=sql103.epizy.com;dbname=epiz_28085125_loja', 'epiz_28085125', '1DPXttyY2au3m');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">

		<title>Produto</title>
	</head>
	<body>
		

		<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
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
		      </ul>
		    </div>
		  </div>
		</nav>


		<div class="container-fluid bg-light">
			<div class="p-4"></div>
			<?php
				try {
				$id = $_GET['p'];
			    $consulta = $conn->query("SELECT nome, descricao, preco, link_imagem FROM produtos where id={$id};");

			    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
			    	$divisao = $linha['preco']/2;
						echo "
							<div id='produto' class='container p-5 rounded'>
								<div class='row'>
									<div class='col-md-6 py-4'>
										<img class='img-fluid' src='img/{$linha['link_imagem']}'>
									</div>
									<div class='col-md-6 py-4'>
										<h1>{$linha['nome']}</h1>
										<hr>
										<p>{$linha['descricao']}</p>
										<h3 class='px-3 text-primary fw-bolder text-end'>R$ {$linha['preco']}</h3>
										<p class='fw-bold text-end px-3' style='color: green'>Em 2x de R$ {$divisao} sem juros</p>
										<hr>
				            <a href='comprar.php' class='btn btn-primary m-1'>Comprar</i></a>
				            <a href='php/adicionar_ao_carrinho.php?p={$id}' class='btn btn-outline-primary m-1'>Adicionar <i class='fa fa-shopping-cart'></i></a>
									</div>
								</div>
							</div>
						";
					}
				} catch(PDOException $e) {
				    echo 'ERROR: ' . $e->getMessage();
				}
			?>
			
			<div class="p-5"></div>
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