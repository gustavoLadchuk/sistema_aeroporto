<?php

    require_once 'models/ListaPassageiros.php';

class Passagem {

    private int $id;
    private int $idPassageiro;
    private int $idListaPassageiros;
    private int $idVoo;

    public function __construct($id, $idPassageiro, $idLista, $idVoo)
    {
        $this->id = $id;
        $this->idPassageiro = $idPassageiro;
        $this->idListaPassageiros = $idLista;
        $this->idVoo = $idVoo;
    }



    public function getId() : int
    {
        return $this->id;
    }

    public function getIdPassageiro() : int
    {
        return $this->idPassageiro;
    }

    public function getIdListaPassageiros() : int
    {
        return $this->idListaPassageiros;
    }

    public function getIdVoo() : int
    {
        return $this->idVoo;
    }
}