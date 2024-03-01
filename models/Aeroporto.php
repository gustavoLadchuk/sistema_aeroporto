<?php

require_once 'models/Local.php';

class Aeroporto{

    private int $id;
    private string $nome;
    private int $idlocalizacao;

    public function __construct($id, $nome, $idlocalizacao)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->idlocalizacao = $idlocalizacao;

    }



    public function getId() : string 
    {
        return $this->id;
    }

    public function getNome() : string 
    {
        return $this->nome;
    }

    public function getLocalizacao() : string 
    {
        return $this->idlocalizacao;
    }
   
}