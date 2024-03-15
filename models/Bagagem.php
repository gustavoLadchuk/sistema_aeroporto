<?php

class Bagagem {

    private int $id;
    private float $peso;
    private string $status;

    public function __construct(int $id, int $peso)
    {
        $this->id = $id;
        $this->peso = $peso;
        $this->status = 'NÃO DESPACHADA';
    }

    public function despachar() : void 
    {
        $this->status = 'DESPACHADA';
    }

    public function coletar() : void 
    {
        $this->status = 'COLETADA';
    }

    

    public function getId() : int
    {
        return $this->id;
    }

    public function getStatus() : string
    {
        return $this->status;
    }

    public function getPeso() : float
    {
        return $this->peso;
    }


}