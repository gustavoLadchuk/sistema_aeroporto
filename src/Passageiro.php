<?php

namespace Gustafl\Aeroporto;

class Passageiro extends Pessoa{


    private Passagem $passagem;
    private Array $bagagens;
    private Status $status;



    public function __construct($nome,$genero, $cpf, $peso) 
    {
        parent::__construct($nome, $genero, $cpf, $peso);
        $this->status = Status::NAO_EMBARCADO;
        $this->bagagens = [];
    }



    public function fazerCheckIn(): void
    {
        $this->status = Status::CHECKIN;
        
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
        $this->status = Status::EMBARCADO;
    }

    public function desembarcar(): void
    {
        $this->status = Status::NAO_EMBARCADO;
    }

    public function comprarPassagem(Voo $voo)
    {
     if ($voo->getStatus() == Status::DISPONIVEL)
     {
        $voo->addPassageiros($this);
        $this->passagem = new Passagem(rand(0, 99999), $voo);
     }
        
    }

    public function getPassagem() : Passagem 
    {
        return $this->passagem;
    }

    public function getBagagens() : array 
    {
        return $this->bagagens;
    }

    public function getStatus() : Status 
    {
        return $this->status;
    }
}

