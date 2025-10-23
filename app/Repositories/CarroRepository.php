<?php

require_once __DIR__ . '/../Services/Connection.php';
require_once __DIR__ . '/../Entities/Carro.php';

class CarroRepository {

    private $db;

    public function __construct() {
        $this->db = Connection::getInstance();
    }

    /**
     * MODIFICADO: A lógica de filtro (if !empty) voltou para cá.
     * Esta é a forma mais simples e legível.
     */
    public function getCarrosEstoque($marca = null, $modelo = null, $ano = null) {
        
        $sql = "SELECT id, marca, modelo, ano_modelo, preco, imagem_principal_url 
                FROM carros 
                WHERE status = 'disponivel'";
        
        $params = [];

        if (!empty($marca)) {
            $sql .= " AND marca LIKE :marca";
            $params[':marca'] = '%' . $marca . '%';
        }
        if (!empty($modelo)) {
            $sql .= " AND modelo LIKE :modelo";
            $params[':modelo'] = '%' . $modelo . '%';
        }
        if (!empty($ano) && is_numeric($ano)) {
            $sql .= " AND ano_modelo = :ano";
            $params[':ano'] = $ano;
        }
        $sql .= " ORDER BY data_cadastro DESC";

        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params); 
            
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Carro');

        } catch (PDOException $e) {
            error_log("Erro ao buscar estoque: " . $e->getMessage());
            return [];
        }
    }

    /**
     * O método getCarrosRecentes continua o mesmo
     */
    public function getCarrosRecentes($limite = 3) {
        $sql = "SELECT id, marca, modelo, preco, imagem_principal_url 
                FROM carros 
                WHERE status = 'disponivel' 
                ORDER BY data_cadastro DESC 
                LIMIT :limite";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':limite', $limite, PDO::PARAM_INT); 
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Carro');
        } catch (PDOException $e) {
            error_log("Erro ao buscar carros recentes: " . $e->getMessage());
            return [];
        }
    }
}
?>