<?php

    require_once 'models/Passagem.php';

class Passageiro {

    
    private string $nome;
    private int $cpf;
    private int $idPassagem;
    private string $status;



    public function __construct($nome, $cpf, $passagem) 
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->idPassagem = $passagem;
        $this->status = 'NÃO EMBARCADO';
    }



    public function fazerCheckIn(): void
    {
        $this->status = 'CHECK IN';
    }

    public function embarcar(): void
    {
        $this->status = 'EMBARCADO';
    }

    public function desembarcar(): void
    {
        $this->status = 'NÃO EMBARCADO';
    }

    public function coletarBagagem(): void
    {

    }

   

    public function getNome() : string 
    {
        return $this->nome;
    }

    public function getCpf() : int 
    {
        return $this->cpf;
    }

    public function getIdPassagem() : int 
    {
        return $this->idPassagem;
    }

    public function getStatus() : string 
    {
        return $this->status;
    }
}

