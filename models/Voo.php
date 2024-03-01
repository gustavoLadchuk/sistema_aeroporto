<?php

    require_once 'models/Aeronave.php';
    require_once 'models/Aeroporto.php';
    require_once 'models/EquipeBordo.php';

class voo {

    private int $id;
    private int $idAeronave;
    private int $idEquipeBordo;
    private int $idAeroportoOrigem;
    private int $idAeroportoDestino;
    private string $horario;
    private int $distancia;
    private string $status;

    public function __construct($id, $aeronave, $equipeBordo, $origem, $destino, $horario)
    {
        $this->status = 'DISPONIVEL';
        $this->id = $id;
        $this->idAeronave = $aeronave;
        $this->idEquipeBordo = $equipeBordo;
        $this->idAeroportoOrigem = $origem;
        $this->idAeroportoDestino = $destino;
        $this->horario = $horario;
    }



    public function calcularDistância(): void 
    {

    }

    public function iniciarVoo(): void
    {
        $this->status = 'INDISPONIVEL';
    }



    public function getId() : int
    {
        return $this->id;
    }

    public function getAeronave() : int
    {
        return $this->idAeronave;
    }

    public function getEquipeBordo() : int
    {
        return $this->idEquipeBordo;
    }

    public function getOrigem() : int
    {
        return $this->idAeroportoOrigem;
    }

    public function getDestino() : int
    {
        return $this->idAeroportoDestino;
    }

    public function getHorario() : int
    {
        return $this->horario;
    }

    public function getDistancia() : int
    {
        return $this->distancia;
    }

    public function getStatus() : int
    {
        return $this->status;
    }
}