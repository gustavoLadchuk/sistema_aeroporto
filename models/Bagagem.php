<?php

    require 'models/Passageiro.php';

class Bagagem {

    private int $id;
    private int $idPassageiro;
    private string $status;

    public function __construct($id, $idPassageiro)
    {
        $this->id = $id;
        $this->idPassageiro = $idPassageiro;
        $this->id = 'NÃO DESPACHADA';
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

    public function getPassageiro() : int
    {
        return $this->idPassageiro;
    }

    public function getStatus() 
    {
        return $this->status;
    }


}