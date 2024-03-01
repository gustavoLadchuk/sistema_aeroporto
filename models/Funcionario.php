<?php

class Funcionario {

    private int $id;
    private string $nome;
    private string $cargo;

    public function __construct($id, $nome, $cargo)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cargo = $cargo;
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

}