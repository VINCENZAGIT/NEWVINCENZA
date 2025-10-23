<?php

// INCLUI OS ARQUIVOS NECESSÁRIOS
// ----------------------------------------------------
// Inclui os Decoradores (os "opcionais")
require_once __DIR__ . '/../Services/Reserva/ReservaSedan.php';
require_once __DIR__ . '/../Services/Reserva/ReservaHatch.php';
require_once __DIR__ . '/../Services/Reserva/ReservaSUV.php';   
require_once __DIR__ . '/../Services/Reserva/SeguroCompletoDecorator.php';
require_once __DIR__ . '/../Services/Reserva/GPSDecorator.php';
// (Adicione 'require_once' para cada novo Decorador que você criar)

// Inclui a Fábrica (que sabe como criar as reservas base)
require_once __DIR__ . '/../Services/Reserva/ReservaFactory.php';
// ----------------------------------------------------


/**
 * ReservaController
 * * Controlador responsável por:
 * 1. Mostrar a página de seleção de categorias de reserva (método index).
 * 2. Processar o cálculo final de uma reserva com opcionais (método processarReserva).
 */
class ReservaController {

    /**
     * Método index()
     * * Exibe a página principal de reservas (a View com as categorias).
     * Esta é a página que o usuário vê quando acessa /reserva.
     */
    public function index() {
        
        // 1. Preparar Dados para a View
        $pageTitle = "Reserva de Veículos";

        // 2. Carregar a View
        require_once __DIR__ . '/../Views/reserva.php';
    }

    /**
     * Método processarReserva()
     * * Este é um EXEMPLO de como você usará o Padrão Decorator + Factory.
     * No futuro, seu Roteador (index.php) terá uma rota 'case /reserva/processar:'
     * que chamará este método.
     */
    public function processarReserva() {
        
        // 1. Simula os dados vindos de um formulário ($_POST)
        $tipoCarro = 'sedan'; // (Vindo de $_POST['tipo_carro'])
        $extras = ['seguro', 'gps']; // (Vindo de $_POST['extras'])

        try {
            // 2. CRIA A RESERVA BASE (USANDO A FÁBRICA)
            // ================================================================
            // O Controller não sabe mais qual classe (ReservaSedan, etc.)
            // deve ser criada. Ele apenas pede à Fábrica.
            $reserva = ReservaFactory::createReservaBase($tipoCarro);
            // ================================================================

            // 3. "DECORA" A RESERVA (Adiciona os opcionais)
            // O Controller "embrulha" o objeto base com os decoradores
            // que o usuário selecionou.
            if (in_array('seguro', $extras)) {
                $reserva = new SeguroCompletoDecorator($reserva);
            }
            if (in_array('gps', $extras)) {
                $reserva = new GPSDecorator($reserva);
            }
            // (Adicione um 'if' para cada opcional que você criar)

            // 4. Obtém o resultado final
            $precoFinal = $reserva->getPreco();
            $descricaoFinal = $reserva->getDescricao();

            // 5. Exibe o resultado (ou salva no banco de dados)
            echo "<html><body style='font-family: Arial, sans-serif; padding: 20px;'>";
            echo "<h1>Resumo do Pedido</h1>";
            echo "<p><b>Descrição:</b> " . htmlspecialchars($descricaoFinal) . "</p>";
            echo "<p><b>Preço Total:</b> R$ " . number_format($precoFinal, 2, ',', '.') . "</p>";
            echo "<a href='/reserva'>Voltar</a>";
            echo "</body></html>";
        
        } catch (Exception $e) {
            // Se a Fábrica lançar um erro (ex: "Tipo de reserva desconhecido")
            // nós o capturamos aqui e mostramos uma mensagem amigável.
            echo "<html><body>";
            echo "<h1>Erro ao processar sua reserva</h1>";
            echo "<p>Ocorreu um erro: " . htmlspecialchars($e->getMessage()) . "</p>";
            echo "<a href='/reserva'>Tentar novamente</a>";
            echo "</body></html>";
        }
    }

} // Fim da classe ReservaController
?>