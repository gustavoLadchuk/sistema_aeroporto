<?php

namespace Gustafl\Aeroporto;

class Local
{

    private string $pais;
    private string $estado;
    private string $cidade;
    private float $latitude;
    private float $longitude;

    public function __construct(string $pais, string $estado, string $cidade)
    {
        $this->pais = $pais;
        $this->estado = $estado;
        $this->cidade = $cidade;
    }



    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }



    public function getPais(): string
    {
        return $this->pais;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }
}
