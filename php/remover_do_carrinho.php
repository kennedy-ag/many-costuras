<?php
	$id = $_GET['p'];

	try {
		$conn = new PDO('mysql:host=localhost;dbname=loja', 'root', '');
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