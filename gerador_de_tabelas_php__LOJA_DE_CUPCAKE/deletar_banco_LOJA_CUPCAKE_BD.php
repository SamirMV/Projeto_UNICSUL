<html>
   <head>
      <title>Connecting MySQLi Server</title>
   </head>
   
   <body>
      <?php

        
  	 $qualquer_DB = "LOJA_CUPCAKE_DB";

  	 include ('1_3_conectar_num_BD.php'); //$$connect_db=mysqli_connect($hostname,$username,$password);
	 
	 $sql =  "DROP DATABASE " .$qualquer_DB;
         
         if (mysqli_query($connect_db, $sql)) {
            echo "Deletado Banco de dados " .$qualquer_DB."<br><br>";
         } else {
            echo "Error Deletando database: " . mysqli_error($$connect_db)."<br><br>";
         }
         mysqli_close($$connect_db);
      ?>
   </body>
</html>
