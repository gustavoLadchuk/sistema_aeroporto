<?php

namespace Gustafl\Aeroporto;

class ListaVoos
{

    private array $voos;

    public function __construct()
    {

    }

    public function addVoo(Voo $voo) 
    {
        array_push($voos, $voo);
    }

    public function getVoos(): array
    {
        return $this->voos;
    }
    
}
