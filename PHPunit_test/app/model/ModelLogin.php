<?php

//echo " inicio do arquivo modelo.php <br>";

//$formName  = $_GET['user'];
//$formSenha = $_GET['pass'];

//echo $formName;
//echo $formSenha;

class ModelLogin
{
    public function dbLogin($nome,$senha)
    {
        //Aqui eu crio minhas regras,
        //por exemplo, buscar esta mensagem
        //no banco de dados
	
	//echo " modelo.php executa pegaMsg() <br>";
	//echo " modelo.php retorna pegaMsg() <br>";
	//$formName  = $_GET['user'];//*****		==> linhas modificadas para teste
	//$formSenha = $_GET['pass'];//*****

	$formName  = $nome;
	$formSenha = $senha;

	$dbName = null;

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
	//===================== REGRA DE VALIDACAO FORM ==========================


	$bancoName	= "LOJA_CUPCAKE_DB";//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
	$tabName	= "USUARIOS";
	
	
	$caminhoAbsoluto = realpath(dirname(__FILE__,2));		//pega o caminho absoluto deste arquivo e sobe um nivel
	include $caminhoAbsoluto.'/connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dadas //*****
	//*****
	//============================ CONSULTA ==================================
	$sql = "select Nome, Senha, endereco_entrega, nome_completo from ".$tabName." where Nome like '$formName';";// o like filtra so duas colunas 
	if ($result = mysqli_query($connect_db, $sql)) 
	{
		
		while($row = mysqli_fetch_row($result)) //cria um Array para cada linha do Obejto $result
		{
			//var_dump ($row);
			$dbName		= $row[0];
			$dbSenha	= $row[1];
			$dbEnderco	= $row[2];
			$dbNomeComp	= $row[3];
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
	//========================= ERRO NA CONSULTA ==============================



	//================== REGRA DE VALIDACAO FORM VS BD ========================
	if (($dbName == $formName) AND ($dbSenha == $formSenha))
	{
		
		// criar a sessao eh guardar o user e pass na memoria do navegador em caso de atualizar pagina
		//session_start();//*****
		$_SESSION["user"] 	= $dbName;
		$_SESSION["pass"] 	= $dbSenha;
		$_SESSION["endereco"] 	= $dbEnderco;
		$_SESSION["nomeComp"]	= $dbNomeComp;
		$userSessao 		= $_SESSION["user"];

		//$_SESSION["numeroCompra"] = $numeroCompra;


		//======================== PEGA O NUMERO DA ULTIMA COMPRA =====================================
		$user			= $_SESSION["user"];
		$bancoName		= "LOJA_CUPCAKE_DB";//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
		$tabName		= "COMPRA";

		include $caminhoAbsoluto.'/connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dadas //*****

		//======================== consulta bd =========================================
		$sql = "SELECT numero_compra FROM ".$tabName." where nome LIKE '$user' ORDER BY compra_id DESC LIMIT 1;";
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
		//====================================================================================================
				
		//$numeroCompra	= $dbName;//retorna o numero pronto para gravar a nova compra
		
		
		$_SESSION["numeroCompra"] = $numeroCompra;
		//========================== FIM PEGAR ULTIMA SESSAO =====================================================



		//echo ' LOGADO COM SUCESSO ';
		$arrayMsg = [$dbName,$dbSenha];//quando a msg chega a sessao foi criada
		
		return $arrayMsg;//*****
		
		//Executa a funcao montar() da classe view com um $parametro

	}
	else
	{

		//echo ' Nome ou Senha INCORRETO ';
		//echo $formName;
		//echo $formSenha;

		$arrayMsg = ['Nome ou','senha INCORRETO'];
		return $arrayMsg;// RETORNA ALGO PARA A FUNCAO DA CLASSE E SAI - PARACE O EXIT
		
	}
	//================== REGRA DE VALIDACAO ===================================


	
	//$arrayMsg = ['Nome','Senha'];// talvez sejam desnecessarios devido aos ifs acima com return era um teste da class
        //return [$arrayMsg];

    }
}
//echo "fim do arquivo modelo.php <br>";
