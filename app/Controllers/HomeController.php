<?php

/**
 * HomeController
 * Este é o controlador responsável por gerenciar a página inicial do site.
 */
class HomeController {

    /**
     * Método index()
     * Esta é a ação padrão para o HomeController. 
     * Ele é responsável por exibir a página inicial (a view 'home.php').
     */
    public function index() {
        
        // 1. Iniciar a sessão
        // Importante para que a View possa verificar se o usuário está logado
        // (para mostrar "Login" ou "Olá, Usuário").
        if (session_status() == PHP_SESSION_NONE) {
           
        }

        // 2. Preparar Dados para a View (se houver)
        // Por enquanto, apenas o título da página.
        $pageTitle = "Vincenza - Página Inicial";

        // 3. Carregar a View
        // Inclui o arquivo da view. A variável $pageTitle estará disponível lá.
        require_once __DIR__ . '/../Views/home.php';
    }
}
?>