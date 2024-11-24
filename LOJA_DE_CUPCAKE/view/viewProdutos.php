<?php

//echo ' inicio do view.php <br>';
class ViewProdutos
{
        private $variavel;				//Declaracao de $variavel						
	
        public function __construct($parametro)
		{	
			//a funcao __construct() recebe o parametro do controller.php e atribui a $variavel como (obejeto)
            $this->variavel = (object) $parametro;		
        }

        public function montarProdutos()			//Por fim imprime o conteudo de $variavel
        {
			
			foreach ($this->variavel->{'0'} as $i)	//passa o numero do produto comeca com o numero um - a chave primaria no BD
			{	
				
				$cod_id[] = $i;	//carrega cod_id somente com a chave primaria - podem ficar fora de ordem ou faltando

				//constroi o HTML para substituicao de campos de acordo com a quantidade de produtos
				$id[] = '<div class="idDiv" id="'.$i.'">'.$i.'{{nome_produto}}'.$i.'{{preco_produto}}'.$i.'{{img}}'.'</div>'; 
					
				$nome_prod[] = '<span class="prod" name="'.$i.'">'.$this->variavel->{'1'}[$i-1].'</span><br>'; // $i-1 eh igual a posicao[0] do array 1 na variavel

				$preco_prod[] = 'R$<span class="preco" name="'.$i.'">'.$this->variavel->{'2'}[$i-1].'</span><br>'; 
				
				$img[] = '<p><img class="cImg" src="../img/'.$i.'_img.jpg" alt="'.$i.'_img"></p>';

				$descricao[] = '<p class="descricao">'.$this->variavel->{'3'}[$i-1].'</p>
						<button onclick=enviarCarrinho("'.$i.'")>comprar</button>';
						
			}
			
			//var_dump($cod_id);
			//print_r($this->variavel->{'1'}[0]);
			

			include 'fopen_puxar_ver_produto.php';	//carrega um .html como string na variavel '$paginaHtml' para ser manipulado pela view 
			
			
			//print_r($this->variavel->scalar);	//quando o login falha

			$paginaHtml = (str_replace('{{id_conteudo}}',implode($id),$paginaHtml));//$pagina recebe ela mesma com id_conteudo alterado 1 vez
			//print_r($paginaHtml);
			
			$j = 0;
			foreach($cod_id as $i)//repete pelo quantidade de produtos no BD
			{
			
				//echo $i;
				$substNome  = $i.'{{nome_produto}}';		//compoe a string para substituir junto com o valor a chave primaria
				$porNome    = $nome_prod[$j];				//recebe um posicao por vez a cada repeticao

				$substPreco = $i.'{{preco_produto}}';
				$porPreco   = $preco_prod[$j];

				$substImg   = $i.'{{img}}';
				$porImg	    = $img[$j].$descricao[$j];
				
				//echo $por;

				$paginaHtml = (str_replace($substPreco, $porPreco, $paginaHtml));//$pagina recebe ela mesma alterando o conteudo a cada repeticao 2 vez

				$paginaHtml = (str_replace($substNome, $porNome , $paginaHtml));//$pagina recebe ela mesma alterando o conteudo a cada repeticao 3 vez

				$paginaHtml = (str_replace($substImg, $porImg , $paginaHtml));//$pagina recebe ela mesma alterando o conteudo a cada repeticao 3 vez
				
				$j++;
				
			}

			print_r($paginaHtml);						//imprime a pagina completamente alterada	
		
        }

}


