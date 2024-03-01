<?php

class ListaPassageiros {

    private int $id;
    private int $idVoo;

    public function __construct($id, $idVoo)
    {
        $this->id = $id;
        $this->idVoo = $idVoo;
    }


    public function getId() : int
    {
        return $this->id;
    }

    public function getVoo() : int
    {
        return $this->idVoo;
    }
}