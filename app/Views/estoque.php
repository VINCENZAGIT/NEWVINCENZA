<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $pageTitle ?? 'Nosso Estoque'; ?></title>
</head>
<body>
    <div id="catalog">
        
        <?php if (empty($carros)): ?>
            
            <p style="text-align: center; font-size: 1.2em; padding: 20px;">Nenhum carro encontrado com esses filtros.</p>

        <?php else: ?>
            <?php foreach ($carros as $carro): ?>
                
                <article class="carro-card">
                    <img class="carimg" src="<?php echo htmlspecialchars($carro->imagem_principal_url); ?>" alt="<?php echo htmlspecialchars($carro->modelo); ?>">
                    <div class="carro-info">
                        <h3><?php echo htmlspecialchars($carro->marca . ' ' . $carro->modelo); ?></h3>
                        <p>Ano: <?php echo htmlspecialchars($carro->ano_modelo); ?></p>
                        <p>Preço: R$ <?php echo number_format($carro->preco, 2, ',', '.'); ?></p>
                        <a href="/carro/<?php echo $carro->id; ?>" class="cta-button">Ver Detalhes</a>
                    </div>
                </article>

            <?php endforeach; ?>
        <?php endif; ?>

    </div>
    
    </body>
</html>