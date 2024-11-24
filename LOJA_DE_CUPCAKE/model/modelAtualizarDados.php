<?php

class ModelAtualizar
{
    public function dbAtualizar()
    {

		$formName  			= $_GET['userCad'];
		$formSenha 			= $_GET['passCad'];
		$formNameCompleto	= $_GET['nomeCompleto'];
		$formEndereco		= $_GET['endereco'];
		$formCelular  		= $_GET['celular'];
		$formEmail 			= $_GET['email'];
		
		session_start();
		$user = $_SESSION["user"];
		$pass = $_SESSION["pass"];


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

		//================== CONFERINDO USER E SENHA ========================
		if (($user != $formName or $pass != $formSenha))
		{
					
			//echo ' ja existe usuario ';
			$arrayMsg = ['aqui nao troca o usuario ',' ou a senha '];
			
			return [$arrayMsg];
			
			//Executa a funcao montar() da classe view com um $parametro

		}
		else
		{
			// atualizar dados
			$bancoName	= "LOJA_CUPCAKE_DB";//sera usado pelo include de conexao - eh bom manter nome do banco e tabela na model
			$tabName	= "USUARIOS";
			
			include '../connect_db/1_3_conectar_num_BD.php'; // faz a conexao com o banco de dados cria o objeto $connect_db
			
			$sql1 = "update USUARIOS SET 
							nome_completo		='$formNameCompleto',
							endereco_entrega	='$formEndereco',
							ddd_celular			='$formCelular',
							email				='$formEmail'
							where Nome='$formName' and senha='$formSenha'";
		
			

			if (mysqli_query($connect_db, $sql1))
			{
			
				//echo ' ja existe usuario ';
				
				$_SESSION["nomeComp"]		= $formNameCompleto;
				$_SESSION["endereco"]		= $formEndereco;
				$_SESSION["celular"]		= $formCelular;
				$_SESSION["email"]			= $formEmail;
				

				$arrayMsg = [$formName,'ATUALIZADO COM SUCESSO!'];
					
				return [$arrayMsg];

			}
			else
			{
		
				echo "Erro atualizando " . $sql1 . " " . mysqli_error($connect_db);
				$connect_db->close();
				exit;
				

			}
			$connect_db->close();

		}

    }
	
}

