<?php

/**
 * PONTO DE ENTRADA ÚNICO (FRONT CONTROLLER)
 *
 * Todas as requisições são direcionadas para este arquivo
 * graças ao comando do servidor (`-t public`).
 */

// 1. Iniciar a Sessão
// Fazemos isso aqui, em um único lugar, para que todas as páginas
// tenham acesso às variáveis de sessão (como $_SESSION['usuario_nome']).
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 2. Obter a Rota (URI)
// Pega a URL que o usuário acessou, ex: "login", "estoque", etc.
// parse_url() remove query strings (ex: ?id=123)
// trim() remove as barras / do início e do fim.
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// 3. Sistema de Roteamento (O "Mapa" do Site)
// O __DIR__ se refere ao diretório ATUAL (public).
// Por isso, usamos '../' para "subir" um nível e entrar na pasta 'app'.

switch ($uri) {
    case '':
    case 'home':
        // Rota: / (página inicial) ou /home
        require_once __DIR__ . '/../app/Controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;

    case 'login':
        // Rota: /login (para MOSTRAR a página)
        require_once __DIR__ . '/../app/Controllers/UsuarioController.php';
        $controller = new UsuarioController();
        $controller->showLoginPage();
        break;

    case 'login/processar':
        // Rota: /login/processar (para RECEBER os dados do formulário)
        require_once __DIR__ . '/../app/Controllers/UsuarioController.php';
        $controller = new UsuarioController();
        $controller->processarLogin();
        break;

    case 'registro/processar':
        // Rota: /registro/processar (para RECEBER os dados do formulário)
        require_once __DIR__ . '/../app/Controllers/UsuarioController.php';
        $controller = new UsuarioController();
        $controller->processarRegistro();
        break;

    case 'logout':
        // Rota: /logout (para deslogar o usuário)
        require_once __DIR__ . '/../app/Controllers/UsuarioController.php';
        $controller = new UsuarioController();
        $controller->logout();
        break;
    

    case 'estoque':
        require_once __DIR__ . '/../app/Controllers/EstoqueController.php';
        $controller = new EstoqueController();
        $controller->index();
        break;


    case 'reserva':
        require_once __DIR__ . '/../app/Controllers/ReservaController.php';
        $controller = new ReservaController();
        $controller->index();
        break;

    // --- ROTAS DE PLACEHOLDER (Ainda não criadas) ---

   

    // --- ROTA PADRÃO (Erro 404) ---

    default:
        // Se nenhuma rota bater, exibe a página 404
        http_response_code(404);
        require_once __DIR__ . '/../app/Views/404.php';
        break;



        // ... (dentro do seu 'switch ($uri)') ...

    // --- ROTA DE TESTE TEMPORÁRIA ---
    case 'testefinanciamento':
        
        // 1. Inclui os arquivos do "motor"
        require_once __DIR__ . '/../app/Services/Financiamento/CalculadoraDeFinanciamento.php';
        require_once __DIR__ . '/../app/Services/Financiamento/BancoDaCasaStrategy.php';
        require_once __DIR__ . '/../app/Services/Financiamento/BancoParceiroStrategy.php';

        $valorCarro = 50000;
        $meses = 48;

        // 2. Testa a Estratégia 1 (Nosso banco)
        $estrategiaCasa = new BancoDaCasaStrategy();
        $calculadoraCasa = new CalculadoraDeFinanciamento($estrategiaCasa);
        $parcelaCasa = $calculadoraCasa->processarCalculo($valorCarro, $meses);

        // 3. Testa a Estratégia 2 (Banco parceiro)
        $estrategiaParceiro = new BancoParceiroStrategy();
        $calculadoraParceiro = new CalculadoraDeFinanciamento($estrategiaParceiro);
        $parcelaParceiro = $calculadoraParceiro->processarCalculo($valorCarro, $meses);

        // 4. Mostra o resultado na tela
        echo "<h1>Teste de Financiamento (R$ 50.000 em 48x)</h1>";
        echo "<p>Parcela (Banco da Casa @ 1.2%): R$ " . number_format($parcelaCasa, 2, ',', '.') . "</p>";
        echo "<p>Parcela (Banco Parceiro @ 1.9%): R$ " . number_format($parcelaParceiro, 2, ',', '.') . "</p>";

        break;
    // --- FIM DA ROTA DE TESTE ---
    
}


?>