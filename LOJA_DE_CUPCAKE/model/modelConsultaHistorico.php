<?php
	
class modelConsultaHistorico
{
	//RETORNA O RESUMO DA COMPRA
	public function dbPegaCompras()
	{
		//echo " modelo.php executa pegaMsg() <br>";
		//echo " dbPegaCompras ";
		$numeroCompra 	=  null;
		$total	  	  	=  null;
		$enderco	  	=  null;
		$pagamento	  	=  null;
		$dataCompra	  	=  null;
		$st_Entrega	  	=  null;
		$dataEntrega  	=  null;
		       
		session_start();
		$user		= $_SESSION["user"];
		
		//===================== CABECHALHO DE CONEXAO DB ===========================
		$bancoName	= "LOJA_CUPCAKE_DB";//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
		$tabName	= "HISTORICO_COMPRA_PAG";

		include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db


		//======================== PEGA OS DADOS DO RESUMO DA COMPRA ===========================================
		$sql = "SELECT numero_compra, total, endereco_entrega, status_pag, data_compra, status_entrega, data_entrega FROM ".$tabName." where user='$user';";
		if ($result = mysqli_query($connect_db, $sql)) 
		{
						
			while($row = mysqli_fetch_row($result)) //cria um Array para cada linha do Obejto $result
			{
				//var_dump ($row);
				$numeroCompra[]	  	= $row[0];
				$total[]	  		= $row[1];
				$enderco[]	  		= $row[2];
				$pagamento[]	  	= $row[3];
				$dataCompra[]	  	= $row[4];
				$st_Entrega[]	  	= $row[5];
				$dataEntrega[]	  	= $row[6];
				
			}
					
			mysqli_free_result($result);

		}

		$arrayMsg = [$numeroCompra,$total,$enderco,$pagamento,$dataCompra,$st_Entrega,$dataEntrega];

		$connect_db->close();

		return [$arrayMsg];// RETORNA ALGO PARA A FUNCAO DA CLASSE E SAI - PARACE O EXIT - volta para quem chamou o conttroler.php
		
	}
	
	//RETORNA O ITENS DENTRO DO RESUMO
	public function dbItensComprados()
	{

		session_start();
		$user			= $_SESSION["user"];
		$numeroCrompra	= $_GET["numeroCrompra"];
		
		//===================== CABECHALHO DE CONEXAO DB ===========================
		$bancoName	= "LOJA_CUPCAKE_DB";//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
		$tabName	= "COMPRA";

		include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db

		//=========== PEGA O NUMERO DA ULTMA COMPRA FAZ A SOMA E LIBERA PARA GRAVAR NA TABELA HISTORICO_COMPRA_PAG ============
		$sql = "SELECT produto, valor FROM COMPRA where nome='$user' and numero_compra=".$numeroCrompra.";";
		if ($result = mysqli_query($connect_db, $sql)) 
		{
			
			while($row = mysqli_fetch_row($result)) //cria um Array para cada linha do Obejto $result
			{
				//var_dump ($row);
				$produto[]  	= $row[0];
				$valor[]	= $row[1];
				
				
				//$produto[]  = $row[0]; // deve ser usado caso a consulta retorne mais de um nome e senha
				//$numeroCompra[] = $row[1];

			}
			//var_dump($produto);
			//var_dump($valor);
			
			mysqli_free_result($result);

		}

		$connect_db->close();
		
		$arrayMsg = [$produto,$valor];

		return [$arrayMsg];// RETORNA ALGO PARA A FUNCAO DA CLASSE E SAI - PARACE O EXIT - volta para quem chamou o conttroler.php
		
	}
	 
}

