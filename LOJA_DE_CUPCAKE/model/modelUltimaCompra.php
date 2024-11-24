<?php

class ModelUltimaCompra
{	
		
	public function dbPegaUltimaCompra()
	{
		$dbName = null;
		session_start();
		
		//===================== CABECHALHO DE CONEXAO DB ===========================
		$user		= $_SESSION["user"];
		$bancoName	= "LOJA_CUPCAKE_DB";//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
		$tabName	= "COMPRA";

		include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db


		//======================== PEGA O NUMERO DA ULTMA COMPRA ===========================================
		$sql = "SELECT numero_compra FROM ".$tabName." where nome LIKE '$user' ORDER BY compra_id DESC LIMIT 1;";
		if ($result = mysqli_query($connect_db, $sql)) 
		{
			
			while($row = mysqli_fetch_row($result)) //cria um Array para cada linha do Obejto $result
			{
				//var_dump ($row);
				$dbName  = $row[0];
				//$dbSenha = $row[1];
				
				//$dbName[]  = $row[0]; // deve ser usado caso a consulta retorne mais de um nome e senha
				//$dbSenha[] = $row[1];

			}
			//var_dump($dbName);
			//var_dump($dbSenha);
			
			mysqli_free_result($result);

		}
		
		$numeroCompra	= $dbName+1;//retorna o numero pronto para gravar a nova compra
			
		$arrayMsg = [$numeroCompra];

		$connect_db->close();

		return [$arrayMsg];// RETORNA ALGO PARA A FUNCAO DA CLASSE E SAI - PARACE O EXIT - volta para quem chamou o conttroler.php
		
	}
   
}
