<?php


//================ TRABALHA COM CAMINHO ABSOLUTO - /var/www/html/../../ =============================

$caminho = realpath(dirname(__FILE__));
//echo $caminho;

$myfile = fopen($caminho."/ver_produtos.html", "r");

while(!feof($myfile)) {//verifica se nao eh o fim do arquivo
 
  $recebeHtml[] = fgets($myfile);
}
fclose($myfile);

$paginaHtml = implode($recebeHtml);

//echo $paginaHtml;

?>
