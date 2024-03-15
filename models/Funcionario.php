<?php

class Funcionario {

    private int $id;
    private string $nome;
    private string $cargo;
    private float $peso;

    public function __construct($id, $nome, $cargo, $peso)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->peso = $peso;
    }

    public function getId(): string 
    {
        return $this->id;
    }

    public function getNome(): string 
    {
        return $this->nome;
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