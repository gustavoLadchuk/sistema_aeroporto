<?php

namespace Gustafl\Aeroporto;

class Piloto extends Pessoa
{

    private int $horasDeVoo;
    private Local $baseDeOperacoes;

    public function __construct(string $nome, 
                                string $genero, 
                                int $cpf, 
                                float $peso, 
                                int $horasDeVoo, 
                                Local $baseDeOperacoes)
    {
        parent::__construct($nome, $genero, $cpf, $peso);
        $this->horasDeVoo = $horasDeVoo;
        $this->baseDeOperacoes = $baseDeOperacoes;
    }

    public function getHorasDeVoo(): int
    {
        return $this->horasDeVoo;
    }

    public function getBaseDeOperacoes(): Local
    {
        return $this->baseDeOperacoes;
    }
}
