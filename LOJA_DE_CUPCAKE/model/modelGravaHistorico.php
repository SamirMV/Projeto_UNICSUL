<?php
	
class ModelGravaHistorico
{
	//================== GRAVA A COMPRA NA FORMA DE PAGAMENTO PIX ===============================================
	public function dbGravaHistoricoPix()
	{
		
		session_start();
		$user			= $_SESSION["user"];
		$numeroCompra 	= $_SESSION["numeroCompra"];//retorna o numero pronto para gravar a nova compra
		$endereco		= $_SESSION["endereco"];
		$statusPag		= "nao";
		$dataCompra		= "DATE_FORMAT(NOW(), '%d-%b-%Y %H:%i')";	
		$statusEntrega	= "nao";
		$dataEntrega	= "nao";
		//var_dump($user);
		//var_dump($numeroCompra);


		//===================== CABECHALHO DE CONEXAO DB ===========================
		$bancoName	= "LOJA_CUPCAKE_DB";//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
		$tabName	= "COMPRA";

		include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db


		
		//=========== PEGA O NUMERO DA ULTMA COMPRA FAZ A SOMA E LIBERA PARA GRAVAR NA TABELA HISTORICO_COMPRA_PAG ============
		$sql = "SELECT nome, numero_compra, sum(valor) as total FROM ".$tabName." where nome='$user' and numero_compra='$numeroCompra'";
		if ($result = mysqli_query($connect_db, $sql)) 
		{
			
			while($row = mysqli_fetch_row($result)) //cria um Array para cada linha do Obejto $result
			{
				//var_dump ($row);
				$nomeUser  		= $row[0];
				$numeroCompra 	= $row[1];
				$total	 		= $row[2];
				
				//$nomeUser[]  = $row[0]; // deve ser usado caso a consulta retorne mais de um nome e senha
				//$numeroCompra[] = $row[1];

			}
			//var_dump($nomeUser);
			//var_dump($numeroCompra);
			
			mysqli_free_result($result);

		}

		$connect_db->close();
		
		
		//===================== CABECHALHO DE CONEXAO DB ===========================
		$bancoName	= "LOJA_CUPCAKE_DB";		//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
		$tabName	= "HISTORICO_COMPRA_PAG";

		include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db


		//==================== GRAVA O RESUMO DA COMPRA NA TABELA ======================
		$sql1 = "INSERT INTO ".$tabName."(	user,
											numero_compra,
											total,
											endereco_entrega,
											status_pag,
											data_compra,
											status_entrega,
											data_entrega)
								VALUES(		'$nomeUser',
											'$numeroCompra',
											'$total',
											'$endereco',
											'$statusPag',
											 $dataCompra,
											'$statusEntrega',
											'$dataEntrega')";
							

		if (mysqli_query($connect_db, $sql1))
		{
			
			$pix = '<p><img src="../img/pix.png" alt="sem_img"></p>';
			//echo ' ja existe usuario ';
			$arrayMsg = [" COMPRA  $numeroCompra REGISTRADA PARA $nomeUser NO VALOR TOTAL DE R$ $total". $pix];

			$connect_db->close();

			return [$arrayMsg];

		}
		else
		{
	
			echo "Erro REGISTRANDO $numeroCompra " . $sql1 . "" . mysqli_error($connect_db);
			$connect_db->close();
			exit;
			
		}

		$connect_db->close();
	
	}

	//============================== GRAVA A COMPRA NA FORMA DE PAGAMENTO EM DINHEITO ==============================
	public function dbGravaHistoricoDinheiro()
	{
				
		session_start();
		$user			= $_SESSION["user"];
		$numeroCompra 	= $_SESSION["numeroCompra"];//retorna o numero pronto para gravar a nova compra
		$endereco		= $_SESSION["endereco"];
		$statusPag		= "nao";
		$dataCompra		= "DATE_FORMAT(NOW(), '%d-%b-%Y %H:%i')";
		$statusEntrega	= "nao";
		$dataEntrega	= "nao";
		//var_dump($user);
		//var_dump($numeroCompra);

		$bancoName	= "LOJA_CUPCAKE_DB";//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
		$tabName	= "COMPRA";

		include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db

		
		//=========== PEGA O NUMERO DA ULTMA COMPRA FAZ A SOMA E LIBERA PARA GRAVAR NA TABELA HISTORICO_COMPRA_PAG ============
		$sql = "SELECT nome, numero_compra, sum(valor) as total FROM ".$tabName." where nome='$user' and numero_compra='$numeroCompra'";
		if ($result = mysqli_query($connect_db, $sql)) 
		{
			
			while($row = mysqli_fetch_row($result)) //cria um Array para cada linha do Obejto $result
			{
				//var_dump ($row);
				$nomeUser  		= $row[0];
				$numeroCompra 	= $row[1];
				$total	 		= $row[2];
				
				//$nomeUser[]  = $row[0]; // deve ser usado caso a consulta retorne mais de um nome e senha
				//$numeroCompra[] = $row[1];

			}
			//var_dump($nomeUser);
			//var_dump($numeroCompra);
			
			mysqli_free_result($result);

		}
	
		$connect_db->close();
		
		//===================== CABECHALHO DE CONEXAO DB ===========================
		$bancoName	= "LOJA_CUPCAKE_DB";		//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
		$tabName	= "HISTORICO_COMPRA_PAG";

		include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db
		
		//================================= GRAVA A SOMA TOTAL DOS VALOR E O NUMERO DA COMPRA NA TABELA ==============	
		$sql1 = "INSERT INTO ".$tabName."(	user,
											numero_compra,
											total,
											endereco_entrega,
											status_pag,
											data_compra,
											status_entrega,
											data_entrega)
								VALUES(		'$nomeUser',
											'$numeroCompra',
											'$total',
											'$endereco',
											'$statusPag',
											 $dataCompra,
											'$statusEntrega',
											'$dataEntrega')";
							

		if (mysqli_query($connect_db, $sql1))
		{
			$pix = '<p>VOCE ESCOLHEU PAGAR EM DINHEIRO OU CARTÃO  NO RECEBIMENTO</p>';
			//echo ' ja existe usuario ';
			$arrayMsg = [" COMPRA  $numeroCompra REGISTRADA PARA $nomeUser NO VALOR TOTAL DE R$ $total". $pix];

			$connect_db->close();

			return [$arrayMsg];

		}
		else
		{
	
			echo "Erro REGISTRANDO $numeroCompra " . $sql1 . "" . mysqli_error($connect_db);
			$connect_db->close();
			exit;
			

		}

		$connect_db->close();

	}
	
}

