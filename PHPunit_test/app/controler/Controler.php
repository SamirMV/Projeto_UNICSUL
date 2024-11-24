<?php
        //namespace App;
	$caminhoAbsoluto = realpath(dirname(__FILE__,2));
	include $caminhoAbsoluto."/model/ModelLogin.php";
/*
	class Produto
        {
		public function valor()
		{

		return $valor = 150;
		}
        }
*/
        class Controler
        {
		public function freteGratis()
		{
			//return $valor = 150;
			
			$preco = new ModelLogin;			//testando o retorno de outra classe
			return $preco->dbLogin("samir1","senha1");		//passa os parametros para model

		}
        }
