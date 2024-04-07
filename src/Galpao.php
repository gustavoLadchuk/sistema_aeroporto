<?php

namespace Gustafl\Aeroporto;

class Galpao extends Estrutura
{
    private int $capacidadeAeronaves;

    public function __construct(int $id, int $capacidadeAeronaves)
    {
        parent::__construct($id);
        $this->capacidadeAeronaves = $capacidadeAeronaves;
    }

    public function getCapacidadeAeronaves(): int
    {
        return $this->capacidadeAeronaves;
    }
}
