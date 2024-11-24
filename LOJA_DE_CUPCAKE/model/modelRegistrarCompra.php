<?php

class ModelRegistraCompra
{
	public function dbRegistraCompra()
	{
		
		session_start();
		$nome			= $_SESSION["user"];		//definido no login
		$formProduto	= $_GET['produto'];	
		$formPreco		= $_GET['preco'];
		$endereco		= $_SESSION["endereco"];	//definido no login
		$numeroCompra	= $_SESSION["numeroCompra"];	// esse eh definido ao clicar no botao finalizar
		
		//===================== CABECHALHO DE CONEXAO DB ===========================
		$bancoName	= "LOJA_CUPCAKE_DB";		//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
		$tabName	= "COMPRA";

		include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db
			
		//==================== GRAVA ITEM POR ITEM NUMA TABELA ======================	
		$sql1 = "INSERT INTO ".$tabName."(	nome,
											produto,
											valor,
											endereco_entrega,
											numero_compra
								)VALUES (	'$nome',
											'$formProduto',
											'$formPreco',
											'$endereco',
											'$numeroCompra')";

		if (mysqli_query($connect_db, $sql1))
		{
		
			$arrayMsg = [' COMPRADO COM SUCESSO!'];

			$connect_db->close();
		
			exit;//NAO RETORNA NADA
		}
		else
		{
	
			echo "Erro cadastrando " . $sql1 . "" . mysqli_error($connect_db);
			$connect_db->close();
			exit;
			
		}
		$connect_db->close();
		
	}
	   
}

