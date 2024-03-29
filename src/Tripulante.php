<?php

namespace Gustafl\Aeroporto;

class Tripulante extends Pessoa{

    private string $cargo;
    private float $peso;

    public function __construct($nome, $genero, $cpf, $peso, $cargo)
    {
        parent::__construct($nome, $genero, $cpf, $peso);
        $this->cargo = $cargo;
        $this->peso = $peso;
    }

    public function getCargo(): string
    {
        return $this->cargo;
    }

    public function getPeso() : float
    {
        return $this->peso;
    }

}