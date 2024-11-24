
<?php

$hostname = "localhost";
$username = "samir";
$password = "123";


$connect_sql=mysqli_connect($hostname,$username,$password);//$somente conecta

 if(! $connect_sql ) {
         die('falhou em logar!' . mysqli_error($connect_sql));
         }
         echo 'logado com sucesso: '.$username;
		 	 
         //mysqli_close($connect_sql);

?>


