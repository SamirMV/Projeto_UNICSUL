<?php

class ModelProdutos
{
    public function dbProduto()
    {
		
		//===================== CABECHALHO DE CONEXAO DB ===========================
		$bancoName	= "LOJA_CUPCAKE_DB";//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
		$tabName	= "PRODUTOS";

		include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dadas $connect_db esta aqui

		if ($result = mysqli_query($connect_db , "SELECT * FROM ".$tabName)) //Cria um Obejto em $result com as propriedades das colunas de ESTOQUE
		{
			//var_dump ($result);
					
			
			while($row = mysqli_fetch_row($result)) //cria um Array para cada linha do Obejto $result
			{
				//var_dump($row);
				//$dbProduto 	= $row[0];
				//$dbPreco 		= $row[1];
				
				$dbId[]			= $row[0]; //deve ser usado caso a consulta retorne mais de um nome e senha
				$dbProduto[]	= $row[1];
				$dbPreco[]		= $row[2];
				$dbDescricao[]	= $row[3];

			}
			//var_dump($dbId);
			//var_dump($dbProduto);
			//var_dump($dbPreco);
					
			mysqli_free_result($result);
		}
		
		mysqli_close($connect_db);


		$arrayMsg = [($dbId),($dbProduto),($dbPreco),($dbDescricao)];// talvez sejam desnecessarios devido aos ifs acima com return era um teste da class
		return [$arrayMsg];

    }
}

