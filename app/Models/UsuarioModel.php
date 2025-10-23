<?php

// Inclui a classe de conexão que criamos (Connection.php)
require_once __DIR__ . '/../Services/Connection.php';

/**
 * UsuarioModel
 *
 * Responsável por todas as operações de banco de dados
 * relacionadas à tabela 'usuarios'.
 */
class UsuarioModel {

    private $db;

    public function __construct() {
        // Pega a instância de conexão PDO
        $this->db = Connection::getInstance();
    }

    /**
     * Busca um usuário pelo seu e-mail.
     * Usado para verificar se o e-mail já existe ou para o processo de login.
     *
     * @param string $email O e-mail do usuário.
     * @return mixed Retorna um array com os dados do usuário se encontrado, ou false se não.
     */
    public function findByEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            // fetch() é usado porque esperamos apenas um resultado
            return $stmt->fetch();

        } catch (PDOException $e) {
            error_log("Erro ao buscar usuário: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Cria um novo usuário no banco de dados.
     *
     * @param string $nome O nome do usuário.
     * @param string $email O e-mail do usuário.
     * @param string $senha_hash A senha já criptografada (hash).
     * @return bool Retorna true se o usuário foi criado com sucesso, false caso contrário.
     */
    public function createUser($nome, $email, $senha_hash) {
        // O nivel_acesso usará o 'cliente' como DEFAULT, conforme definimos no SQL
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha_hash);
            
            return $stmt->execute();

        } catch (PDOException $e) {
            // Se o e-mail for duplicado, o banco de dados (por causa do 'UNIQUE')
            // vai gerar um erro. Nós o capturamos aqui.
            error_log("Erro ao criar usuário: " . $e->getMessage());
            return false;
        }
    }
}
?>