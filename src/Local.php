<?php

namespace Gustafl\Aeroporto;

class Local {

    private int $id;
    private string $pais;
    private string $estado;
    private string $cidade;
    private string $latitude;
    private string $longitude;

    public function __construct($id, $pais, $estado, $cidade, $latitude, $longitude)
    {
        $this->id = $id;
        $this->pais = $pais;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }



    public function getId() : int
    {
        return $this->id;
    }

    public function getPais() : string
    {
        return $this->pais;
    }

    public function getEstado() : string
    {
        return $this->estado;
    }

    public function getCidade() : string
    {
        return $this->cidade;
    }

    public function getLatitude() : string
    {
        return $this->latitude;
    }

    public function getLongitude() : string
    {
        return $this->longitude;
    }
}