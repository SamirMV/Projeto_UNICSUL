<?php

class ModelLogin
{
    public function dbLogin()
    {
	 
		$formName  = $_GET['user'];
		$formSenha = $_GET['pass'];
		
		$_SESSION["user"] = null;
		
		$dbName			= null;
		$dbSenha		= null;
		$dbEnderco		= null;
		$dbNomeComp		= null;
		$dbCelular		= null;
		$dbEmail		= null;

		$numeroCompra 		= null;

		//===================== REGRA DE VALIDACAO FORM ==========================
		if  (isset($formName) AND isset($formSenha))
		{
			if ($formName=='' or $formSenha=='') //verifica se 'Nome' ou 'Senha' esta vazio e executa a ação correspondente
			{			
				//echo ' Nome ou Senha EM BRANCOoooo ';
				$arrayMsg = ['Nome ou Senha','BRANCOoooo '];
				return [$arrayMsg];
				
			}
		}
		
		//===================== CABECHALHO DE CONEXAO DB ===========================
		$bancoName	= "LOJA_CUPCAKE_DB";//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
		$tabName	= "USUARIOS";

		include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dadas
		
		//============================ CONSULTA ==================================
		$sql = "select Nome, Senha, nome_completo, endereco_entrega, ddd_celular, email from ".$tabName." where Nome like '$formName';";// o like filtra so duas colunas 
		if ($result = mysqli_query($connect_db, $sql)) 
		{
			
			while($row = mysqli_fetch_row($result)) //cria um Array para cada linha do Obejto $result
			{
				//var_dump ($row);
				$dbName		= $row[0];
				$dbSenha	= $row[1];
				$dbNomeComp	= $row[2];
				$dbEnderco	= $row[3];
				$dbCelular	= $row[4];
				$dbEmail	= $row[5];
				//$dbName[]  = $row[0]; // deve ser usado caso a consulta retorne mais de um nome e senha
				//$dbSenha[] = $row[1];
		
			}
			//var_dump($dbName);
			//var_dump($dbSenha);
			
			mysqli_free_result($result);
			
		}
		//============================ CONSULTA ==================================
		


		//========================= ERRO NA CONSULTA ==============================
		else
		{
		echo "Error: " . $sql . "" . mysqli_error($connect_db);
		}

		$connect_db->close();

		//================== REGRA DE VALIDACAO FORM VS BD ========================
		if (($dbName == $formName) AND ($dbSenha == $formSenha))
		{
			
			// criar a sessao eh guardar o user e pass na memoria do navegador em caso de atualizar pagina
			session_start();
			$_SESSION["user"] 				= $dbName;
			$_SESSION["pass"] 				= $dbSenha;
			$_SESSION["nomeComp"]			= $dbNomeComp;
			$_SESSION["endereco"] 			= $dbEnderco;
			$_SESSION["celular"] 			= $dbCelular;
			$_SESSION["email"]				= $dbEmail;

			//===================== CABECHALHO DE CONEXAO DB ===========================
			$bancoName		= "LOJA_CUPCAKE_DB";//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
			$tabName		= "COMPRA";

			include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db


			//======================== consulta bd =========================================
			$sql = "SELECT numero_compra FROM ".$tabName." where nome LIKE '$dbName' ORDER BY compra_id DESC LIMIT 1;";
			if ($result = mysqli_query($connect_db, $sql)) 
			{
				
				while($row = mysqli_fetch_row($result)) //cria um Array para cada linha do Obejto $result
				{
					//var_dump ($row);
					$numeroCompra  = $row[0];
					//$dbSenha = $row[1];
					
					//$dbName[]  = $row[0]; // deve ser usado caso a consulta retorne mais de um nome e senha
					//$dbSenha[] = $row[1];

				}
				//var_dump($dbName);
				//var_dump($dbSenha);
				
				mysqli_free_result($result);

			}
			$connect_db->close();
							
			$_SESSION["numeroCompra"] = $numeroCompra;
		
			$arrayMsg = ['LOGADO','COM SUCESSO',$dbName,$dbSenha,$dbNomeComp,$dbEnderco,$dbCelular,$dbEmail,$numeroCompra];//quando a msg chega a sessao foi criada
			
			return [$arrayMsg];

		}
		else
		{
			$arrayMsg = ['Nome ou','senha INCORRETO',null,null,null,null,null,null,null];
			return [$arrayMsg];// RETORNA ALGO PARA A FUNCAO DA CLASSE E SAI - PARACE O EXIT
			
		}
	
	}
	
}
