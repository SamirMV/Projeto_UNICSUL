<?php

class ModelCadastrar
{
    public function dbCadastrar()
    {
 
		$formName  		= $_GET['userCad'];
		$formSenha 		= $_GET['passCad'];
		$formNameCompleto	= $_GET['nomeCompleto'];
		$formEndereco		= $_GET['endereco'];
		$formCelular  		= $_GET['celular'];
		$formEmail 		= $_GET['email'];
		
		$dbName = null;

		//===================== REGRA DE VALIDACAO FORM ==========================
		if  (isset($formName) AND isset($formSenha) AND isset($formNameCompleto) AND isset($formEndereco) AND isset($formCelular) AND isset($formEmail))
		{
			 //verifica se 'Nome' ou 'Senha' esta vazio e executa a ação correspondente
			if ($formName=='' or $formSenha=='' or $formNameCompleto=='' or $formEndereco=='' or $formCelular=='' or $formEmail=='')
			{			
				//echo ' Nome ou Senha EM BRANCOoooo ';
				$arrayMsg = ['Campo em branco',' Preencha Todos! '];
				return [$arrayMsg];
				
			}
		}
		
		//===================== CABECHALHO DE CONEXAO DB ===========================
		$bancoName	= "LOJA_CUPCAKE_DB";//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
		$tabName	= "USUARIOS";

		include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db
		
		//============================ CONSULTA ==================================
		$sql = "select Nome from ".$tabName." where Nome like '$formName';";
		if ($result = mysqli_query($connect_db, $sql)) 
		{
			
			while($row = mysqli_fetch_row($result)) //cria um Array para cada linha do Obejto $result
			{
				//var_dump ($row);
				$dbName  = $row[0];
				//$dbName[]  = $row[0]; // deve ser usado caso a consulta retorne mais de um nome e senha	
			}
			//var_dump($dbName);
			
			mysqli_free_result($result);
		
		}

		//========================= ERRO NA CONSULTA ==============================
		else
		{
			echo "Erro na Consulta: " . $sql . "" . mysqli_error($connect_db);
			$connect_db->close();	
			exit;	
		}

		$connect_db->close();

		//================== REGRA DE VALIDACAO FORM VS BD ========================
		if (($dbName == $formName))
		{
					
			//echo ' ja existe usuario ';
			$arrayMsg = ['Ja existe um usuario '.$dbName,' FALHOU'];
			
			return [$arrayMsg];

		}
		else
		{
			//$bancoName	= "LOJA_CUPCAKE_DB";//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
			//$tabName	= "USUARIOS";
			
			include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db
				
			$sql1 = "INSERT INTO ".$tabName."(	Nome,
												Senha,
												nome_completo,
												endereco_entrega,
												ddd_celular,
												email
									)VALUES (	'$formName',
												'$formSenha',
												'$formNameCompleto',
												'$formEndereco',
												'$formCelular',
												'$formEmail')";

			if (mysqli_query($connect_db, $sql1))
			{
			
				//echo ' ja existe usuario ';
				$arrayMsg = [$formName,' CADASTRADO COM SUCESSO!'];
			
				return [$arrayMsg];

			}
			else
			{
		
				echo "Erro cadastrando " . $sql1 . " " . mysqli_error($connect_db);
				$connect_db->close();
				exit;
				
			}
			$connect_db->close();

		}

    }
	
}

