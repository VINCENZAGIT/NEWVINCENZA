<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $pageTitle ?? 'Reserva de Veículos'; ?></title>
    
    <link rel="stylesheet" href="/css/reserva.css">
</head>
<body>
    <header class="site-header">
        <div class="title-wrap">
            <div class="tag-badge" aria-hidden="true">
                <span class="tag-brand">VINCENZA</span>
            </div>
            <h1><?php echo $pageTitle ?? 'Reserva de Veículos'; ?></h1>
        </div>
        <div class="actions">
            
            <?php if (isset($_SESSION['usuario_nome'])): ?>
                <a class="login" href="/minha-conta" aria-label="Minha Conta">🔒 <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></a>
                <a class="login" href="/logout" aria-label="Sair">Sair</a>
            <?php else: ?>
                <a class="login" href="/login" aria-label="Login">🔒 Login</a>
            <?php endif; ?>
            
            <div class="nav-links">
                <a href="/">Home</a>
                <span>Voltar</span>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="reserva">
            
            <article class="card">
                <img class="img" src="/images/hatch.png" alt="Carro Hatch">
                <h2>Hatch</h2>
                <p class="ctb">Valor diario R$50</p>
                <button class="cta">Reserve aqui!</button>
            </article>

            <article class="card">
                <img class="img" src="/images/sedan.png" alt="Carro Sedan">
                <h2>Sedan</h2>
                <p class="ctb">Valor diario R$80</p>
                <button class="cta">Reserve aqui!</button>
            </article>

            <article class="card">
                <img class="img" src="/images/suv.png" alt="Carro SUV">
                <h2>SUV</h2>
                <p class="ctb">Valor diario R$130</p>
                <button class="cta">Reserve aqui!</button>
            </article>

        </section> </main> </body>
</html>