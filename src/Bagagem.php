<?php

namespace Gustafl\Aeroporto;

class Bagagem {

    private int $id;
    private float $peso;
    private Status $status;

    public function __construct(int $id, int $peso)
    {
        $this->id = $id;
        $this->peso = $peso;
        $this->status = Status::NAO_DESPACHADA;
    }

    public function despachar() : string 
    {
        if ($this->status == Status::NAO_DESPACHADA){
            $this->status = Status::DESPACHADA;
            return 'A bagagem foi despachada';
        }
        return 'A bagagem não pode ser despachada';
    }

    public function coletar() : string 
    {
        if ($this->status == Status::DISPONIVEL_COLETA){
            $this->status = Status::COLETADA;
            return 'A bagagem foi coletada';
        }
        return 'A bagagem não pode ser despachada';

    }

    

    public function getId() : int
    {
        return $this->id;
    }

    public function getStatus() : Status
    {
        return $this->status;
    }

    public function getPeso() : float
    {
        return $this->peso;
    }


}