<?php
defined('CONTROL') or die('Acesso negado!');
?>

<hr>
<span>Usuario: <strong><?=$_SESSION['usuario']?></strong></span>
<span>
    <a href="?rota=logout">Log out</a>
</span>
<hr>

<nav>
    <a href="?rota=home">Home</a>
    <a href="?rota=page1">Pag 1</a>
    <a href="?rota=page2">Pag 2</a>
    <a href="?rota=page3">Pag 3</a>
    <a href="?rota=logout">Sair</a>
</nav>