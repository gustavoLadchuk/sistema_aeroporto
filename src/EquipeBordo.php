<?php

namespace Gustafl\Aeroporto;

class EquipeBordo
{

    private Piloto $piloto;
    private Piloto $copiloto;
    private Comissario $comissarioDeBordo;


    public function __construct(Piloto $piloto, Piloto $copiloto, Comissario $comissarioDeBordo)
    {
        $this->piloto = $piloto;
        $this->copiloto = $copiloto;
        $this->comissarioDeBordo = $comissarioDeBordo;
    }

    

    public function getPiloto(): Piloto
    {
        return $this->piloto;
    }

    public function getCopiloto(): Piloto
    {
        return $this->copiloto;
    }

    public function getComissario(): Comissario
    {
        return $this->comissarioDeBordo;
    }
}
