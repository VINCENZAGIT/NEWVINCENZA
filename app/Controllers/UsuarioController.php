<?php

// Inclui o Model que acabamos de criar
require_once __DIR__ . '/../Models/UsuarioModel.php';

/**
 * UsuarioController
 *
 * Gerencia o login, registro e logout de usuários.
 */
class UsuarioController {

    private $model;

    public function __construct() {
        $this->model = new UsuarioModel();
    }
    
    /**
     * Exibe a página de login e registro (a View).
     */
    public function showLoginPage() {
        if (session_status() == PHP_SESSION_NONE) {
        
        }

        $pageTitle = "Login & Registro";
        require_once __DIR__ . '/../Views/login.php';
    }

    /**
     * Processa a tentativa de registro de um novo usuário.
     */
    public function processarRegistro() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // 1. Validar os dados recebidos (do formulário)
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /login'); // Redireciona se não for POST
            exit;
        }

        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $senha_confirm = $_POST['senha_confirm'] ?? '';

        // Validação simples
        if (empty($nome) || empty($email) || empty($senha)) {
            $_SESSION['error_message'] = "Por favor, preencha todos os campos.";
            header('Location: /login');
            exit;
        }

        if ($senha !== $senha_confirm) {
            $_SESSION['error_message'] = "As senhas não conferem.";
            header('Location: /login');
            exit;
        }

        // 2. Verificar se o e-mail já existe
        if ($this->model->findByEmail($email)) {
            $_SESSION['error_message'] = "Este e-mail já está cadastrado.";
            header('Location: /login');
            exit;
        }

        // 3. Criptografar a senha (SEGURANÇA!)
        $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

        // 4. Pedir ao Model para criar o usuário
        $sucesso = $this->model->createUser($nome, $email, $senha_hash);

        if ($sucesso) {
            // 5. Sucesso! Fazer o auto-login e redirecionar
            $_SESSION['usuario_logado'] = true;
            $_SESSION['usuario_nome'] = $nome;
            $_SESSION['usuario_email'] = $email;
            header('Location: /'); // Redireciona para a página inicial
            exit;
        } else {
            $_SESSION['error_message'] = "Ocorreu um erro ao criar sua conta. Tente novamente.";
            header('Location: /login');
            exit;
        }
    }

    /**
     * Processa a tentativa de login de um usuário.
     */
    public function processarLogin() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /login');
            exit;
        }
        
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        // 1. Buscar o usuário no banco pelo e-mail
        $usuario = $this->model->findByEmail($email);

        // 2. Verificar se o usuário existe E se a senha está correta
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            
            // 3. Sucesso! Criar a sessão
            session_regenerate_id(true); // Segurança extra
            $_SESSION['usuario_logado'] = true;
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_email'] = $usuario['email'];
            $_SESSION['usuario_nivel'] = $usuario['nivel_acesso'];

            header('Location: /'); // Redireciona para a home
            exit;

        } else {
            // 4. Falha no login
            $_SESSION['error_message'] = "E-mail ou senha inválidos.";
            header('Location: /login');
            exit;
        }
    }

    /**
     * Faz o logout do usuário (destrói a sessão).
     */
    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();    // Limpa todas as variáveis da sessão
        session_destroy();  // Destrói a sessão

        header('Location: /'); // Redireciona para a home
        exit;
    }
}
?>