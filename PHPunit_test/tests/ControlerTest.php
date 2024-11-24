<?php
        //namespace Tests;
	
        use PHPUnit\Framework\TestCase;
        //use App;						//usa a classe Compra na pasta app/ que esta no arquivo compra
	$caminhoAbsoluto = realpath(dirname(__FILE__,2));	//pega o caminho absoluto deste arquivo e sobe um nivel
	include $caminhoAbsoluto."/app/controler/Controler.php";
        class ControlerTest extends TestCase			//classe termina com Test
        {
            public function testFreteGratis()			//funcao comeca com test
            {
		
		
                $compra = new Controler(); 			//$compra recebe a classe original para usar a funcao
		$recebido = $compra->freteGratis();		//a funcao que sera testada

		$experado = ["samir1","senha1"];		//valor que a funcao devera retornar

                $this->assertSame($experado, $recebido); 	//pssa um parametro para a funcao da classe original e verifica se eh verdadeiro
            }
        }
