<?php

require_once __DIR__ . '/ReservaInterface.php';

class ReservaSedan implements ReservaInterface {
    
    public function getPreco() {
        return 80.00; // Preço base do Sedan
    }

    public function getDescricao() {
        return "Reserva de Sedan";
    }
}
?>