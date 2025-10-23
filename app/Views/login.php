<?php
// Inicia a sessão para que possamos mostrar mensagens de erro (ex: "Usuário ou senha inválidos")
if (session_status() == PHP_SESSION_NONE) {

}
?>
<!DOCTYPE html>
<html lang="pt-br"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="/css/style.css"> 
    
    <title><?php echo $pageTitle ?? 'Login & Registro'; ?></title>
</head>
<body>

    <form id="login" method="POST" action="/registro/processar">
        <h1>Registro</h1> <div id="baseLogin">
                <div class="input-container">
                        Nome completo
                        <div><input type="text" name="nome" required></div>
                        <br>
                        Data de nascimento (Opcional, não está no nosso BD)
                        <div id="container-flex">
                        <input type="date" name="data_nascimento" id="date1"/>        
                        </div>
                        <br>
                        E-mail
                        <div><input type="email" name="email" required></div>
                        <br>
                        Telefone (Opcional, não está no nosso BD)
                        <div><input type="tel" name="telefone"></div>
                        <br>
                        Senha
                        <div><input type="password" name="senha" required></div>
                        <br>
                        Repetir senha
                        <div><input type="password" name="senha_confirm" required></div>
                        <br>
                </div>
                <div><button type="submit" id="botao">Cadastrar</button></div>
            </div>
    </form>

    <form id="registro" method="POST" action="/login/processar">
        <h1>Login</h1> <div id="baseRegistro">
                <div class="input-container">
                        E-mail
                        <div><input type="email" name="email" required></div>
                        <br>
                        Senha
                        <div><input type="password" name="senha" required></div>
                        <br>
                </div>
                <div><button type="submit" id="botao">Entrar</button></div>
            </div>
    </form>

    <?php if (isset($_SESSION['error_message'])): ?>
        <div style="color: red; text-align: center; margin-top: 10px;">
            <?php 
                echo $_SESSION['error_message']; 
                unset($_SESSION['error_message']); // Limpa a mensagem após exibir
            ?>
        </div>
    <?php endif; ?>

</body>
</html>