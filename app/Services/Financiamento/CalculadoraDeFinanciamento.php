<?php

require_once __DIR__ . '/TaxaDeJurosStrategyInterface.php';

/**
 * O "Contexto" (Quem usa a Estratégia)
 *
 * Esta classe NÃO SABE como o cálculo é feito,
 * ela apenas sabe que deve "plugar" uma estratégia.
 */
class CalculadoraDeFinanciamento {
    
    private $estrategia;

    // O "encaixe": pluga a estratégia
    public function __construct(TaxaDeJurosStrategyInterface $estrategia) {
        $this->estrategia = $estrategia;
    }

    // O "botão de ligar": executa o cálculo
    public function processarCalculo($valor, $meses) {
        return $this->estrategia->calcularParcelas($valor, $meses);
    }
}
?>