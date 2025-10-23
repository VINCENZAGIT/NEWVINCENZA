<?php

require_once __DIR__ . '/TaxaDeJurosStrategyInterface.php';

/**
 * Estratégia Concreta 1: Financiamento da "Vincenza"
 */
class BancoDaCasaStrategy implements TaxaDeJurosStrategyInterface {
    
    // Nossa taxa promocional: 1.2% ao mês
    private const TAXA_DE_JUROS_MENSAL = 0.012; 

    public function calcularParcelas($valorPrincipal, $numeroMeses) {
        // Fórmula de Financiamento (Tabela Price)
        // PMT = P * [r(1+r)^n] / [(1+r)^n - 1]
        
        $r = self::TAXA_DE_JUROS_MENSAL; // Taxa (r)
        $n = $numeroMeses;               // Período (n)

        if ($r == 0) { // Evita divisão por zero se a taxa for 0
            return $valorPrincipal / $n;
        }

        $fator = pow(1 + $r, $n);
        $parcela = $valorPrincipal * ($r * $fator) / ($fator - 1);

        return $parcela;
    }
}
?>