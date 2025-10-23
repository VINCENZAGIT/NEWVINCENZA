<?php

/**
 * Interface (O "Contrato" / "Encaixe")
 *
 * Define que toda Estratégia de cálculo de juros DEVE
 * ter um método 'calcularParcelas'.
 */
interface TaxaDeJurosStrategyInterface {
    
    /**
     * @param float $valorPrincipal O valor total a ser financiado.
     * @param int $numeroMeses O número de parcelas.
     * @return float O valor da parcela mensal.
     */
    public function calcularParcelas($valorPrincipal, $numeroMeses);
}
?>