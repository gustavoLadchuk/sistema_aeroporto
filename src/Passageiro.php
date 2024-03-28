<?php

namespace Gustafl\Aeroporto;

class Passageiro {

    
    private string $nome;
    private string $genero;
    private int $cpf;
    private int $peso;
    private Passagem $passagem;
    private Array $bagagens;
    private string $status;



    public function __construct($nome,$genero, $cpf, $peso) 
    {
        $this->nome = $nome;
        $this->genero = $genero;
        $this->cpf = $cpf;
        $this->peso = $peso;
        $this->status = 'NÃO EMBARCADO';
        $this->bagagens = [];
    }



    public function fazerCheckIn(): void
    {
        $this->status = 'CHECK IN';
        
        foreach ($this->bagagens as $bagagem) {
            $bagagem->despachar();
        }
    }

    public function addBagagem(Bagagem $bagagem): void
    {
        array_push($this->bagagens, $bagagem);
    }

   
    public function embarcar(): void
    {
        $this->status = 'EMBARCADO';
    }

    public function desembarcar(): void
    {
        $this->status = 'NÃO EMBARCADO';
    }

    public function comprarPassagem(Passagem $passagem)
    {
        $this->passagem = $passagem;
        $passagem->getVoo()->addPassageiros($this);
    }

    public function getNome() : string 
    {
        return $this->nome;
    }

    public function getGenero() : string
    {
        return $this->genero;
    }

    public function getCpf() : int 
    {
        return $this->cpf;
    }

    public function getPassagem() : Passagem 
    {
        return $this->passagem;
    }

    public function getBagagens() : array 
    {
        return $this->bagagens;
    }

    public function getPeso() : int
    {
        return $this->peso;
    }

    public function getStatus() : string 
    {
        return $this->status;
    }
}

