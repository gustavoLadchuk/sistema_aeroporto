<?php

namespace Gustafl\Aeroporto;

class Piloto extends Tripulante
{

    private int $horasDeVoo;
    private Local $baseDeOperacoes;

    public function __construct(string $nome, 
                                Genero $genero, 
                                int $cpf, 
                                float $peso, 
                                int $horasDeVoo, 
                                Local $baseDeOperacoes,
                                float $salario)
    {
        parent::__construct($nome, $genero, $cpf, $peso, $salario);
        $this->horasDeVoo = $horasDeVoo;
        $this->baseDeOperacoes = $baseDeOperacoes;
    }

    public function getCargo() : string
    {
        return 'pilot' . $this->getSufixoGenero();
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
