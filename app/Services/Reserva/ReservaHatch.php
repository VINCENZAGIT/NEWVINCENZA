<?php

// Inclui o "contrato" (Interface) que esta classe deve seguir
require_once __DIR__ . '/ReservaInterface.php';

/**
 * Classe Base ReservaHatch (O "Núcleo")
 *
 * Representa a reserva base para um carro Hatch.
 * Ela implementa a ReservaInterface.
 */
class ReservaHatch implements ReservaInterface {
    
    /**
     * Retorna o preço base para um Hatch.
     * (Baseado na sua view reserva.php - "Valor diario R$50")
     */
    public function getPreco() {
        return 50.00;
    }

    /**
     * Retorna a descrição base.
     */
    public function getDescricao() {
        return "Reserva de Hatch";
    }
}
?>