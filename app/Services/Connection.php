<?php

/**
 * Classe de Conexão (Singleton Pattern)
 *
 * Garante que exista apenas UMA instância de conexão PDO
 * em toda a aplicação, economizando recursos.
 */
class Connection {

    /**
     * @var PDO A única instância da conexão PDO.
     */
    private static $pdo_instance = null;

    /**
     * O construtor é privado para impedir a criação direta
     * de instâncias com 'new Connection()'.
     */
    private function __construct() {}

    /**
     * O método estático que obtém a instância.
     *
     * @return PDO A instância da conexão PDO.
     */
    public static function getInstance() {
        
        // Se a instância ainda não foi criada...
        if (self::$pdo_instance === null) {

            // 1. Inclui o arquivo de configuração (com as senhas e DSN)
            // __DIR__ é 'app/Models', então subimos dois níveis ('../../') para chegar na raiz
            // e depois entramos em 'config/'.
            require_once __DIR__ . '/../../config/database.php';

            try {
                // 2. Cria a nova conexão PDO
                // As constantes (DB_DSN, DB_USER, DB_PASS) e a variável ($pdo_options)
                // vêm do arquivo 'database.php' que incluímos acima.
                self::$pdo_instance = new PDO(DB_DSN, DB_USER, DB_PASS, $pdo_options);
                
            } catch (PDOException $e) {
                // Em caso de falha, exibe uma mensagem de erro.
                die("Erro ao conectar com o banco de dados: " . $e->getMessage());
            }
        }

        // 3. Retorna a instância (seja a nova ou a que já existia)
        return self::$pdo_instance;
    }
}
?>