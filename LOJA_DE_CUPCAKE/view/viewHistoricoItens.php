<?php

class ViewHistoricoItens
{
        private $variavel;				//Declaracao de $variavel						
	
        public function __construct($parametro) {	//a funcao __construct() recebe o parametro do controller.php e atribui a $variavel como (obejeto)
                $this->variavel = (object) $parametro;		
        }
	
	
        public function montarProdutos()		//Por fim imprime o conteudo de $variavel
        {
			//echo 'montarProdutos <br>';

			[$produto] = [$this->variavel->{'0'}];

			$j = 0;
			foreach ($produto as $i)	//passa o produto como posicao da linha[] - eh so pra gerar repeticoes ate o fim do produto
			{	
				$k = 0;//numera cada item
				foreach ($this->variavel as $valor)	//passa cada objeto para valor
				{
				
					if($k == 1)
					{
						$arrayHtml[] = '<div id="itensConsulta">R$ '.$valor[$j].'</div>';//coloca o cifrao
					}
					else
					{
						$arrayHtml[] = '<div id="itensConsulta">'.$valor[$j].'</div>'; //passa cada valor como um item de array
					}
														
					$k++;

				}
				$arrayHtml[] = '<br>';
				$j++;
				//var_dump($arrayHtml);
				
			}

			//var_dump ($produto);
			

			
			
			// conten a variavel '$paginaHtml'
			include 'fopen_viewHistoricoIntens.php';	//carrega um .html como string na variavel '$paginaHtml' para ser manipulado pela view 
			
			
			//print_r($this->variavel->scalar);	//quando o login falha

			$paginaHtml = (str_replace('{{conteudo}}',implode($arrayHtml),$paginaHtml));//$pagina recebe ela mesma com id_conteudo alterado
			
			//$paginaHtml = (str_replace('{{nome_conteudo}}',implode($nome),$paginaHtml));//$pagina recebe ela mesma com nome_conteudo alterado

			//$paginaHtml = (str_replace('{{senha_conteudo}}',implode($senha),$paginaHtml));//$pagina recebe ela mesma com senha_conteudo alterado

			print_r($paginaHtml);

			//print_r($this->variavel->{'1'});	//quando o login funciona
			
			//var_dump($this->variavel);
		
        }

}
