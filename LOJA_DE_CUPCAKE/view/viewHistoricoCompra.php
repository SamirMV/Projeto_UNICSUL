<?php

//echo ' inicio do view.php <br>';
class ViewHistoricoCompra
{
        private $variavel;				//Declaracao de $variavel						
	
        public function __construct($parametro) {	//a funcao __construct() recebe o parametro do controller.php e atribui a $variavel como (obejeto)
                $this->variavel = (object) $parametro;		
        }
	
	
        public function verHistoricoCompra()		//Por fim imprime o conteudo de $variavel
        {
			//echo 'view executa montar() <br>';
			//echo  '<br>';
		
			

			$arrayHtml[] = '<div id="menuFixo">
						<div id="divConsulta">Nº Compra</div>
						<div id="divConsulta">Total</div>
						<div id="divConsulta" style="width:250px;">Endereço de entrega</div>
						<div id="divConsulta">Status pagamento</div>
						<div id="divConsulta">Data da compra</div>
						<div id="divConsulta">Status entrega</div>
						<div id="divConsulta">Data daentrega</div>
					</div>				
					<br><br>';

			
			[$numeroCompra] = [$this->variavel->{'0'}];
			//var_dump ($numeroCompra);
			
			
			$j = 0;
			foreach ($numeroCompra as $i)	//passa o numeroCompra como posicao da linha[] - eh so pra gerar repeticoes ate o fim do numeroCompra
			{	
				$k = 0;//numera cada item

				$arrayHtml[] = '<div id="menuConsulta">';//abre o bloco
				foreach ($this->variavel as $valor)	//passa cada objeto para valor
				{
					if($k == 2)
					{
						$arrayHtml[] = '<div id="divConsulta" style="width:250px;">'.$valor[$j].'</div>';//Modifica a div do endereco
					}
					else
					{	
						if($k == 1)
						{
							$arrayHtml[] = '<div id="divConsulta">R$ '.$valor[$j].'</div>'; //coloca o cifrao na div total
						}
						else
						{
							$arrayHtml[] = '<div id="divConsulta">'.$valor[$j].'</div>'; //passa cada valor como um item de array
						}
					}
					$k++;
				}
				$j++;

				$arrayHtml[] = "<button style='margin-right:10px;' onclick='pegaItens(\"$j\")'>Ver Itens</button><br><br><hr><p id=\"$j\"></p></div><br>";//fecha o bloco
				
				
				//var_dump($arrayHtml);
				
			}

			//var_dump ($numeroCompra);
			
		
			
			// conten a variavel '$paginaHtml'
			include 'fopen_viewHistoricoCompra.php';	//carrega um .html como string na variavel '$paginaHtml' para ser manipulado pela view 
			
			
			//print_r($this->variavel->scalar);	//quando o login falha

			$paginaHtml = (str_replace('{{conteudo}}',implode($arrayHtml),$paginaHtml));//$pagina recebe ela mesma com id_conteudo alterado
		
			print_r($paginaHtml);

			//print_r($this->variavel->{'1'});	//quando o login funciona
			
			//var_dump($this->variavel);
		
        }

}


//echo ' fim do arquivo view.php <br>';
