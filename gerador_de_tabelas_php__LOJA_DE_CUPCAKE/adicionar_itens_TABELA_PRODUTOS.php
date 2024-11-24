<?php


		$qualquer_DB 	= "LOJA_CUPCAKE_DB";		//sera usado pelo include de conexao - eh bom manter nome do banco visivel
		$tabName	= "PRODUTOS";

		include '1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db
			
		$nome 		= "Cake Blue";
		$preco		= "10";
		$descricao 	= "feito com Blue Berry";


		
		$sql = "INSERT INTO $tabName(
						nome,
						preco,
						descricao
				)VALUES(	'$nome',
						'$preco',
						'$descricao')";


		if (mysqli_query($connect_db, $sql))
		{
			echo "Produto adcionado $nome"."<br><br>";			
		}
		else
		{
			echo "Falha ao adicionar  $nome". mysqli_error($connect_db)."<br><br>"; 
		}
		$connect_db->close();



		include '1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db
			
		$nome 		= "Cake Pink";
		$preco		= "20";
		$descricao 	= "feito de manga Rosa";

		$sql = "INSERT INTO ".$tabName."(	nome,
							preco,
							descricao
					)VALUES (	'$nome',
							'$preco',
							'$descricao')";

		if (mysqli_query($connect_db, $sql))
		{
			echo "Produto adcionado $nome"."<br><br>";			
		}
		else
		{
			echo "Falha ao adicionar  $nome". mysqli_error($connect_db)."<br><br>"; 
		}
		$connect_db->close();
		


		include '1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db
			
		$nome 		= "Cake Gold";
		$preco		= "30";
		$descricao 	= "feito com Chocolate";

		$sql = "INSERT INTO ".$tabName."(	nome,
							preco,
							descricao
					)VALUES (	'$nome',
							'$preco',
							'$descricao')";


		if (mysqli_query($connect_db, $sql))
		{
			echo "Produto adcionado $nome"."<br><br>";			
		}
		else
		{
			echo "Falha ao adicionar  $nome". mysqli_error($connect_db)."<br><br>"; 
		}
		$connect_db->close();

		
?>
