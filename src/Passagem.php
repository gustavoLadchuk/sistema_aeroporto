<?php

namespace Gustafl\Aeroporto;

class Passagem
{

    private int $id;
    private Voo $voo;
    private bool $validade;

    public function __construct(int $id, Voo $voo)
    {
        $this->id = $id;
        $this->voo = $voo;
        $this->validade = true;
    }



    public function getId(): int
    {
        return $this->id;
    }

    public function getVoo(): Voo
    {
        return $this->voo;
    }

    public function getValidade(): bool
    {
        return $this->validade;
    }

    public function usarPassagem()
    {
        $this->validade = false;
    }
}
