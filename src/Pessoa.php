<?php

namespace Gustafl\Aeroporto;

class Pessoa
{

    private string $nome;
    private Genero $genero;
    private int $cpf;
    private float $peso;

    public function __construct(string $nome, Genero $genero, int $cpf, float $peso)
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

    public function getGenero(): Genero
    {
        return $this->genero;
    }

    public function getSufixoGenero(): string
    {
        if ($this->genero == Genero::MASCULINO) {
            return 'o';
        }
        return 'a';
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
