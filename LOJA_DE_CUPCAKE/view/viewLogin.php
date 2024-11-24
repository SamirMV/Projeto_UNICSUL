<?php

//echo ' inicio do view.php <br>';
class ViewLogin
{
        private $variavel;				//Declaracao de $variavel						
	
        public function __construct($parametro) {	//a funcao __construct() recebe o parametro do controller.php e atribui a $variavel como (obejeto)
                $this->variavel = (object) $parametro;		
        }

        public function montar()			//Por fim imprime o conteudo de $variavel
        {
			//echo 'view executa montar() <br>';
			//echo 'view imprime montar() <br>';
			
			foreach ($this->variavel as $valor)	//passa cada objeto para valor
			{
				$dados[] = '<div>'.$valor.'</div>'; //passa cada valor como um item de array
			}		
			
			
			//$htmlPagina = '<h2>{{conteudo}}</h2>';  //simula uma pagina html
			
			// conten a variavel '$paginaHtml'
			include 'fopen_puxar_arquivo.php';	//carrega um .html como string na variavel '$paginaHtml' para ser manipulado pela view 
			
			
			//print_r($this->variavel->scalar);	//quando o login falha

			print_r(str_replace('{{conteudo}}',implode($dados),$paginaHtml));//implode transforma Array em string //aqui sempre executa

			//print_r($this->variavel->{'1'});	//quando o login funciona
			
			//print_r($this->variavel);
			
        }

}
