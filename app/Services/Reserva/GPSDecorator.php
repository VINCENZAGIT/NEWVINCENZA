<?php

require_once __DIR__ . '/AbstractReservaDecorator.php';

class GPSDecorator extends AbstractReservaDecorator {
    
    private const PRECO_GPS = 15.00;

    public function getPreco() {
        return $this->reserva->getPreco() + self::PRECO_GPS;
    }

    public function getDescricao() {
        return $this->reserva->getDescricao() . ", com GPS incluído";
    }
}
?>