<?php

class EquipeBordo {

    private int $id;
    private int $idPiloto;
    private int $idCopiloto;
    private int $idServicoBordo;
    private int $idVoo;

    public function __construct($id, $piloto, $copiloto, $servico, $voo)
    {
        $this->id = $id;
        $this->idPiloto = $piloto;
        $this->idCopiloto = $copiloto;
        $this->idServicoBordo = $servico;
        $this->idVoo = $voo;

    }



    public function getId() : int 
    {
        return $this->id;
    }

    public function getPiloto() : int 
    {
        return $this->idPiloto;
    }

    public function getCopiloto() : int 
    {
        return $this->idCopiloto;
    }

    public function getServico() : int 
    {
        return $this->idServicoBordo;
    }

    public function getVoo() : int 
    {
        return $this->idVoo;
    }
   
}