<?php

require_once __DIR__ . '/../Repositories/CarroRepository.php';
require_once __DIR__ . '/../Entities/Carro.php';

class EstoqueController {

    public function index() {
        
        $marca = $_GET['marca'] ?? null;
        $modelo = $_GET['modelo'] ?? null;
        $ano = $_GET['ano'] ?? null;

        try {
            // MODIFICADO: A lógica voltou a ser simples.
            // O Controller apenas passa os filtros para o Repositório.
            $carroRepository = new CarroRepository();
            $carros = $carroRepository->getCarrosEstoque($marca, $modelo, $ano);

        } catch (Exception $e) {
            $carros = [];
            error_log($e->getMessage());
        }

        $pageTitle = "Nosso Estoque";
        require_once __DIR__ . '/../Views/estoque.php';
    }
}
?>