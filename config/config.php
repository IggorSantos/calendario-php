<?php
#Caminhos absolutos
$dirInt="";
define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$dirInt}");
$bar=(substr($_SERVER['DOCUMENT_ROOT'],-1) =='/')?"":"/";
define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$bar}{$dirInt}");


#Banco de Dados
define('HOST', 'localhost');
define('DB', 'calendario');
define('USER', 'root');
define('PASS', '');

#Incluir arquivos
include(DIRREQ.'agenda-calendar/lib/composer/vendor/autoload.php');
  

