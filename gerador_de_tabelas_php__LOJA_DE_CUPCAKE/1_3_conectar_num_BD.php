
<?php

$hostname = "localhost";
$username = "samir";
$password = "123";


$connect_db=mysqli_connect($hostname,$username,$password,$qualquer_DB);//as variaveis vem do arquivo no include

 	if(! $connect_db ) {
         die('Could not connect DB: ' . mysqli_error());
         }
         echo 'Conectado ao DB: '.$qualquer_DB;


?>


