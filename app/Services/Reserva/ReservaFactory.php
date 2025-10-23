<?php

// Inclui os "produtos" que esta fábrica pode criar
require_once __DIR__ . '/ReservaHatch.php';
require_once __DIR__ . '/ReservaSedan.php';
require_once __DIR__ . '/ReservaSUV.php';
require_once __DIR__ . '/ReservaInterface.php';

/**
 * ReservaFactory
 *
 * Esta classe é a única responsável por saber como criar
 * um objeto de reserva base a partir de uma string.
 */
class ReservaFactory {

    /**
     * @param string $tipo O tipo de carro (ex: 'hatch', 'sedan')
     * @return ReservaInterface O objeto de reserva base correspondente
     * @throws Exception Se o tipo for inválido
     */
    public static function createReservaBase($tipo) {
        
        // Escondemos o 'switch' aqui dentro!
        switch ($tipo) {
            case 'hatch':
                return new ReservaHatch();
            case 'sedan':
                return new ReservaSedan();
            case 'suv':
                return new ReservaSUV();
            default:
                // Lança um erro se o tipo for desconhecido
                throw new Exception("Tipo de reserva desconhecido: $tipo");
        }
    }
}
?>