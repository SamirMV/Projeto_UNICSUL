<?php

include '../view/viewBemVindo.php';		// classe View - funcao _construct() - funcao montar()
include '../view/viewLogin.php';  		// classe View - funcao _construct() - funcao montar()
include '../view/viewProdutos.php';  		// classe ViewProdutos - funcao _construct() - montarProdutos()
include '../view/viewRegistrarCompra.php';
include '../view/viewHistoricoCompra.php';
include '../view/viewHistoricoItens.php';


include '../model/modelCadastrar.php'; 		// classe ModelCadastrar - funcao dbCadastrar()
include '../model/modelAtualizarDados.php';
include '../model/modelLogin.php'; 		// classe ModelLogin - funcao dbLogin()
include '../model/modelProdutos.php';
include '../model/modelRegistrarCompra.php';	//classe ModelCompra - funcao dbRegistraCompra()
include '../model/modelUltimaCompra.php';	//classe ModelUltimaCompra - funcao dbPegaUltimaCompra()
include '../model/modelGravaHistorico.php';	//classe ModelGravaHistorico - funcao dbGravaHistorico()
include '../model/modelConsultaHistorico.php';




//echo "inicio do arquivo controler.php <br>";
class Controller
{
			
	public function login()
    {
			
		//echo 'executou login() no controller';
		$objeto = new ModelLogin();			//Cria um objeto para poder executar a funcao pegaMsg()
		
		
		$sendView = (object) $objeto->dbLogin();	//Executa a funcao pegaMsg() na classe model e guarda o retorno transformando em OBJETO 
		//var_dump($sendView);
		
		$objLimpo = (object) $sendView->{'0'};		//$objLimpo recebe um ARRAY do objeto na posicao {'0'}=colunas e transforma em OBJETO 
		//var_dump($objLimpo);
		

		$param1 = $objLimpo->{'0'};//paramx da funcao testSessao
		$param2 = $objLimpo->{'1'};//paramy da funcao testSessao
		$param3	= $objLimpo->{'2'};
		$param4 = $objLimpo->{'3'};
		$param5	= $objLimpo->{'4'};
		$param6	= $objLimpo->{'5'};
		$param7	= $objLimpo->{'6'};
		$param8	= $objLimpo->{'7'};
		$param9	= $objLimpo->{'8'};
		
		if ($param3 == null)
		{
			//envia parametro para a classe do arquivo include e executa a funcao
			return (new ViewLogin([$param1,$param2]))->montar(); 
		}
		else
		{
		
			//envia parametro para a classe do arquivo include e executa a funcao
			return (new ViewLogin([$param1,$param2,$param3,$param4,$param5,$param6,$param7,$param8,$param9]))->montar(); 
		}
		
    }
	
	public function cadastrar()
    {
                		
		$objeto = new ModelCadastrar();			//Cria um objeto para poder executar a funcao()
		
		
		$sendView = (object) $objeto->dbCadastrar();	//Executa a funcao() na classe model e guarda o retorno transformando em OBJETO 
		//var_dump($sendView);
		
		$objLimpo = (object) $sendView->{'0'};		//$objLimpo recebe um ARRAY do objeto na posicao {'0'}=colunas e transforma em OBJETO 
		//var_dump($objLimpo);
		

		$param1 = $objLimpo->{'0'};
		$param2 = $objLimpo->{'1'};
		//$param3	= $objLimpo->{'2'};

		//envia parametro para a classe View do arquivo view.php e executa a funcao montar()
		return (new ViewLogin([$param1,$param2]))->montar(); 
		
    }
	
	public function atualizar()
    {
		
		$objeto = new ModelAtualizar();			//Cria um objeto para poder executar a funcao()
		
		
		$sendView = (object) $objeto->dbAtualizar();	//Executa a funcao() na classe model e guarda o retorno transformando em OBJETO 
		//var_dump($sendView);
		
		$objLimpo = (object) $sendView->{'0'};		//$objLimpo recebe um ARRAY do objeto na posicao {'0'}=colunas e transforma em OBJETO 
		//var_dump($objLimpo);
		

		$param1 = $objLimpo->{'0'};
		$param2 = $objLimpo->{'1'};
		//$param3	= $objLimpo->{'2'};

		//envia parametro para a classe View do arquivo view.php e executa a funcao montar()
		return (new ViewLogin([$param1,$param2]))->montar(); 
		
    }

	public function listarProduto()
    {
		
		$objeto = new ModelProdutos();				//Cria um objeto para poder executar a funcao pegaMsg()
		
		
		$sendView = (object) $objeto->dbProduto();	//Executa a funcao() na classe model e guarda o retorno transformando em OBJETO 
		//var_dump($sendView);
		
		$objLimpo = (object) $sendView->{'0'};		//$objLimpo recebe um ARRAY do objeto na posicao {'0'}=colunas e transforma em OBJETO 
		//var_dump($objLimpo);
		

		$param1 = $objLimpo->{'0'};
		$param2 = $objLimpo->{'1'};
		$param3	= $objLimpo->{'2'};
		$param4	= $objLimpo->{'3'};

		return (new ViewProdutos([$param1,$param2,$param3,$param4]))->montarProdutos(); 
		
    }

	public function ultimaCompra()
    
	{
		
		session_start();
		
		if (!isset($_SESSION["user"])){return "";};
			
		$param1 = $_SESSION["user"];
		//var_dump($_SESSION["user"]);
		
		if ($param1 != null)
		{
			
			$objeto = new ModelUltimaCompra();

			$sendView = (object) $objeto->dbPegaUltimaCompra();

			$objLimpo = (object) $sendView->{'0'};

			$param1 = $objLimpo->{'0'};

			//echo $param1;
			$_SESSION["numeroCompra"] = $param1;//recebe o novo numero para registrar a compra - deveria ficar no model
			return "";
			
		}
		
	}
	
	public function ConsultaHistorico()
    {
		
		$objeto = new modelConsultaHistorico();

		$sendView = (object) $objeto->dbPegaCompras();

		$objLimpo = (object) $sendView->{'0'};
		
		
				
		$param1 = $objLimpo->{'0'};
		$param2 = $objLimpo->{'1'};
		$param3	= $objLimpo->{'2'};
		$param4	= $objLimpo->{'3'};
		$param5 = $objLimpo->{'4'};
		$param6	= $objLimpo->{'5'};
		$param7	= $objLimpo->{'6'};
		
		return (new ViewHistoricoCompra([$param1,$param2,$param3,$param4,$param5,$param6,$param7]))->verHistoricoCompra(); 
	}
	
	public function pegaItensHistorico()
    {						
	
		$objeto = new modelConsultaHistorico();

		$sendView = (object) $objeto->dbItensComprados();

		$objLimpo = (object) $sendView->{'0'};

		$param1 = $objLimpo->{'0'};
		$param2 = $objLimpo->{'1'};
				
		return (new viewHistoricoItens([$param1,$param2]))->montarProdutos(); 

	}

	public function gravaHistoricoCompraPix()
    {
		
		$objeto = new ModelGravaHistorico();

		$sendView = (object) $objeto->dbGravaHistoricoPix();

		$objLimpo = (object) $sendView->{'0'};

	
		$param1 = $objLimpo->{'0'};
		//$param2 = $objLimpo->{'1'};
		//$param3	= $objLimpo->{'2'};

		
		//envia parametro para a classe View do arquivo view.php e executa a funcao montar()
		return (new View([$param1]))->montar(); 
		
	}

	public function gravaHistoricoCompraDinheiro()
    {
		
		//session_start();
		
		$objeto = new ModelGravaHistorico();

		$sendView = (object) $objeto->dbGravaHistoricoDinheiro();

		$objLimpo = (object) $sendView->{'0'};

	
		$param1 = $objLimpo->{'0'};
		//$param2 = $objLimpo->{'1'};
		//$param3	= $objLimpo->{'2'};

		//envia parametro para a classe View do arquivo view.php e executa a funcao montar()
		return (new View([$param1]))->montar(); 
		
	}

	public function gravarCompra()
	{
		   
		$objeto = new ModelRegistraCompra();		
				
		$sendView = (object) $objeto->dbRegistraCompra(); 
		
		$objLimpo = (object) $sendView->{'0'};		
		
	}
	
	public function testSessao()
	{
		
		session_start();
		if (!isset($_SESSION["user"])){return "";};//retorna vazio para o javaScript que chamou
		
		$paramx = "LOGADO!";
		$paramy = "COM SUCESSO!";
		$param1 = $_SESSION["user"];
		$param2 = $_SESSION["pass"];
		$param3 = $_SESSION["nomeComp"];
		$param4 = $_SESSION["endereco"];
		$param5 = $_SESSION["celular"];
		$param6 = $_SESSION["email"];
		$param7 = $_SESSION["numeroCompra"];

		//$param2 = echo ($param1);
	
		return (new ViewLogin([$paramx,$paramy,$param1,$param2,$param3,$param4,$param5,$param6,$param7]))->montar(); 
		
	}
	
	public function encerrarSessao()
	{
		
		session_start();
		session_unset();
		echo "usuario encerrou a sessao";
	
	}
	
}		
		//session_start();
		//global $_SESSION;
		
		$formMetodo = $_GET['metodo'];//recebe o metodo do index

		(new Controller)->$formMetodo();	

