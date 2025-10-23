<?php

require_once __DIR__ . '/AbstractReservaDecorator.php';

class SeguroCompletoDecorator extends AbstractReservaDecorator {
    
    private const PRECO_SEGURO = 35.50;

    // "Decora" o preço: pega o preço anterior e SOMA o seu
    public function getPreco() {
        return $this->reserva->getPreco() + self::PRECO_SEGURO;
    }

    // "Decora" a descrição: pega a descrição anterior e CONCATENA a sua
    public function getDescricao() {
        return $this->reserva->getDescricao() . ", com seguro completo";
    }
}
?>