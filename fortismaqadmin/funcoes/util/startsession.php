<?php
/**
 * @copyright (c) 2012, SANDRO GONÇALVES
 */
  session_start();

  if (!isset($_SESSION['id__profile_loja'])) {
    if (isset($_COOKIE['id__profile_loja']) && isset($_COOKIE['nome_loja'])) {
      $_SESSION['id__profile_loja'] = $_COOKIE['id__profile_loja'];
      $_SESSION['nome_loja'] = $_COOKIE['nome_loja'];
    }
  }
?>
