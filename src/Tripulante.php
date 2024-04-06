<?php

namespace Gustafl\Aeroporto;

class Tripulante extends Pessoa
{

    private float $salario;

    public function __construct(string $nome, Genero $genero, int $cpf, float $peso, float $salario)
    {
        parent::__construct($nome, $genero, $cpf, $peso);
        $this->salario = $salario;
    }

    public function getSalario(): float
    {
        return $this->salario;
    }

}
