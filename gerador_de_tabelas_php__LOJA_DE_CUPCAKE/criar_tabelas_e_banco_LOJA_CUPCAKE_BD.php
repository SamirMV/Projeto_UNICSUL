<html>
   <head>
      <title>CRIAR TABELAS LOJA CUPCAKE</title>
   </head>
   
   <body>
      <?php

	//CRIA O BANCO DE DADOS
  	 $qualquer_DB = "LOJA_CUPCAKE_DB";

  	 include ('1_2_conectar_MySQL.php'); //$connect_sql=mysqli_connect($hostname,$username,$password);
		
	 		
         $sql =  "CREATE DATABASE " .$qualquer_DB;
         
         if (mysqli_query($connect_sql, $sql)) {
            echo "<br><br>"."Criado Banco de dados ".$qualquer_DB."<br><br>";
         } 
	 else {
            echo "Falhou em criar o BD " . mysqli_error($connect_sql)."<br><br>";
         }
         mysqli_close($connect_sql);


	//CRIA TABELA PRODUTOS
	$tabName = "PRODUTOS";
	
	 include ('1_3_conectar_num_BD.php');
			

	 $sql = "create table $tabName(
		`prod_id` int(11) NOT NULL AUTO_INCREMENT,
		`nome` varchar(32) NOT NULL,
		`preco` varchar(32) NOT NULL,
		`descricao` varchar(64) DEFAULT NULL,
		 PRIMARY KEY (`prod_id`))";   
         
         if(mysqli_query($connect_db,$sql)){  
         	echo "Table e colunas criadas! $tabName"."<br><br>";
         } else {  
         	echo "Table is not criada!!! ". mysqli_error($connect_db)."<br><br>"; 
	 }  
         mysqli_close($connect_db);  

	
	//CRIA TABELA USUARIO
	$tabName = "USUARIOS";

	 include ('1_3_conectar_num_BD.php');

			
	 $sql = "create table $tabName(
		`cod_id` int(11) NOT NULL AUTO_INCREMENT,
		`Nome` varchar(32) NOT NULL,
		`Senha` varchar(32) NOT NULL,
		`nome_completo` varchar(64) DEFAULT NULL,
		`endereco_entrega` varchar(64) DEFAULT NULL,
		`ddd_celular` varchar(14) DEFAULT NULL,
		`email` varchar(64) DEFAULT NULL,
		PRIMARY KEY (`cod_id`))";   
         
         if(mysqli_query($connect_db,$sql)){  
         	echo "Table e colunas criadas! $tabName"."<br><br>"; 
         } else {  
         	echo "Table is not criada!!! ". mysqli_error($connect_db)."<br><br>"; 
	 }  
         mysqli_close($connect_db);  


	//CRIA TABELA PARA REGISTRAR COMPRA
	$tabName = "COMPRA";

	include ('1_3_conectar_num_BD.php');
			

	 $sql = "create table $tabName(
		`compra_id` int(11) NOT NULL AUTO_INCREMENT,
		`nome` varchar(32) NOT NULL,
		`produto` varchar(32) NOT NULL,
		`valor` varchar(11) NOT NULL,
		`endereco_entrega` varchar(64) NOT NULL,
		`numero_compra` int(5) NOT NULL,
		 PRIMARY KEY (`compra_id`))";   
         
         if(mysqli_query($connect_db,$sql)){  
         	echo "Table e colunas criadas! $tabName"."<br><br>"; 
         } else {  
         	echo "Table is not criada!!! ". mysqli_error($connect_db)."<br><br>"; 
	 }  
         mysqli_close($connect_db);  

	

	//CRIA TABELA PARA REGISTRAR O RESUMA DA COMPRA
	 $tabName	= "HISTORICO_COMPRA_PAG";	
	
	 include ('1_3_conectar_num_BD.php');
			

	 $sql = "create table $tabName(
		`pag_id` int(11) NOT NULL AUTO_INCREMENT,
		`user` varchar(32) NOT NULL,
		`numero_compra` int(5) NOT NULL,
		`total` varchar(32) NOT NULL,
		`endereco_entrega` varchar(64) NOT NULL,
		`status_pag` varchar(32) NULL,
		`data_compra` varchar(32) NULL,
		`status_entrega` varchar(32) NULL,
		`data_entrega` varchar(32) NULL,
		 PRIMARY KEY (`pag_id`))";   
         
         if(mysqli_query($connect_db,$sql)){  
         	echo "Table e colunas criadas! $tabName"."<br><br>";  
         } else {  
         	echo "Table is not criada!!! $tabName". mysqli_error($connect_db)."<br><br>"; 
	 }  
         mysqli_close($connect_db); 
      ?>
   </body>
</html>
