<?php

/**
 * Entidade Carro
 *
 * Esta classe é um "molde" de dados. Ela não tem lógica de banco de dados,
 * apenas representa um carro do nosso sistema.
 * As propriedades são públicas para permitir que o PDO as preencha automaticamente.
 */
class Carro {
    public $id;
    public $marca;
    public $modelo;
    public $versao;
    public $ano_fabricacao;
    public $ano_modelo;
    public $quilometragem;
    public $cor;
    public $preco;
    public $descricao;
    public $imagem_principal_url;
    public $status;
    public $data_cadastro;
}
?>