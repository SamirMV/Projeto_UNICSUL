<?php
        //namespace App;
	$caminhoAbsoluto = realpath(dirname(__FILE__,2));
	include $caminhoAbsoluto."/model/Produto.php";
/*
	class Produto
        {
		public function valor()
		{

		return $valor = 150;
		}
        }
*/
        class Compra
        {
		public function freteGratis()
		{
			//return $valor = 150;
			
			$preco = new Produto;			//testando o retorno de outra classe
			return $preco->valor("samir1","senha");		//passa os parametros

		}
        }
