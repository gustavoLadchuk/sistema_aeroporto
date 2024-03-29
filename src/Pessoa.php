<?php

namespace Gustafl\Aeroporto;

class Pessoa
{

    private string $nome;
    private string $genero;
    private int $cpf;
    private float $peso;

    public function __construct(string $nome, string $genero, int $cpf, float $peso)
    {
        $this->nome = $nome;
        $this->genero = $genero;
        $this->cpf = $cpf;
        $this->peso = $peso;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getGenero(): string
    {
        return $this->genero;
    }

    public function getCpf(): int
    {
        return $this->cpf;
    }

    public function getPeso(): float
    {
        return $this->peso;
    }
}
