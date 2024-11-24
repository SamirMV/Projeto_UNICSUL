<html>
   <head>
      <title>Connecting MySQLi Server</title>
   </head>
   
   <body>
      <?php

  	 $qualquer_DB = "LOJA_CUPCAKE_DB";
	 $tabName = "HISTORICO_COMPRA_PAG";

  	 include ('1_3_conectar_num_BD.php'); //$$connect_db=mysqli_connect($hostname,$username,$password);

	 
	 $sql =  "drop TABLE $qualquer_DB.$tabName";
         
         if (mysqli_query($connect_db, $sql)) {
            echo "TABELA Deletado successfully " .$qualquer_DB.$tabName;
         } else {
            echo "Error Deletando TABELA: " . mysqli_error($$connect_db);
         }
         mysqli_close($$connect_db);
      ?>
   </body>
</html>
