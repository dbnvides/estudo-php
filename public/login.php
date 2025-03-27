<?php
defined('CONTROL') or die('Acesso negado!');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $erro = null;

    if(empty($usuario) || empty($senha)){
        $erro = "Usuario e senha são obrigatorios";
    }

    if(empty($erro)){
        $usuarios = require_once __DIR__ . '/../inc/usuarios.php';

        foreach($usuarios as $user){
            if($user['usuario'] == $usuario && password_verify($senha, $user['senha'])){
                $_SESSION['usuario'] = $usuario;
                header('location: index.php?rota=home');
            }
        }

        $erro = "Usuario e/ou senha inválidos";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="index.php?rota=login" method="post">
        <h3>Login</h3>
        <div>
            <label for="usuario">Usuario</label>
            <input type="email" name="usuario" id="usuario">
        </div>
        <div>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha">
        </div>
        <div>
            <button type="submit">Entrar</button>
        </div>
    </form>
    <?php if(!empty($erro)) :?>
        <p><?= $erro ?></p>
    <?php endif; ?>
</body>
</html>
