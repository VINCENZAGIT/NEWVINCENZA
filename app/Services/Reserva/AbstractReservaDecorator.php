<?php

require_once __DIR__ . '/ReservaInterface.php';

abstract class AbstractReservaDecorator implements ReservaInterface {
    
    protected $reserva;

    // Recebe o objeto que ele vai "decorar" (seja o café base ou outro opcional)
    public function __construct(ReservaInterface $reserva) {
        $this->reserva = $reserva;
    }

    // Por padrão, ele apenas repassa a chamada para o objeto "embrulhado"
    public function getPreco() {
        return $this->reserva->getPreco();
    }

    public function getDescricao() {
        return $this->reserva->getDescricao();
    }
}
?>