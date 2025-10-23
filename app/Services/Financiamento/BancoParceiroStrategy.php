<?php

require_once __DIR__ . '/TaxaDeJurosStrategyInterface.php';

/**
 * Estratégia Concreta 2: Banco Parceiro (ex: Itaú, Bradesco)
 */
class BancoParceiroStrategy implements TaxaDeJurosStrategyInterface {
    
    // Taxa de mercado: 1.9% ao mês
    private const TAXA_DE_JUROS_MENSAL = 0.019; 

    public function calcularParcelas($valorPrincipal, $numeroMeses) {
        $r = self::TAXA_DE_JUROS_MENSAL;
        $n = $numeroMeses;

        if ($r == 0) {
            return $valorPrincipal / $n;
        }

        $fator = pow(1 + $r, $n);
        $parcela = $valorPrincipal * ($r * $fator) / ($fator - 1);

        return $parcela;
    }
}
?>