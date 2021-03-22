<?php
	$id = $_GET['p'];

	try {
		$conn = new PDO('mysql:host=sql103.epizy.com;dbname=epiz_28085125_loja', 'epiz_28085125', '1DPXttyY2au3m');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $conn->prepare('DELETE FROM carrinho WHERE produto_id = :id AND user_id = :user');
		$stmt->execute(array(
			':id' => $id,
			':user' => $_COOKIE['cpf']
		));

		header("Location: ../carrinho.php");
	} catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
	}
?>