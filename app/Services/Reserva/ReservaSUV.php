<?php

// Inclui o "contrato" (Interface) que esta classe deve seguir
require_once __DIR__ . '/ReservaInterface.php';

/**
 * Classe Base ReservaSUV (O "Núcleo")
 *
 * Representa a reserva base para um carro SUV.
 * Ela implementa a ReservaInterface.
 */
class ReservaSUV implements ReservaInterface {
    
    /**
     * Retorna o preço base para um SUV.
     * (Baseado na sua view reserva.php - "Valor diario R$130")
     */
    public function getPreco() {
        return 130.00;
    }

    /**
     * Retorna a descrição base.
     */
    public function getDescricao() {
        return "Reserva de SUV";
    }
}
?>