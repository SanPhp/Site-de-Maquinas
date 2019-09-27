<?php
 /**
 * @copyright (c) 2012, SANDRO GONÇALVES
 */
  $username = 'teste';
  $password = 'teste';

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
    
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Estofados Mempra"');
	header("Content-type: text/html; charset=utf-8");
    exit('<h2>Sistema Admistrativo Mempra, AVISO!</h2>Desculpe, você tem que digitar um nome de usuario e senha validos para acessar está página.');
  }
?>
