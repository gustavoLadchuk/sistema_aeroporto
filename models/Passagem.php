<?php

class Passagem {

    private int $id;
    private Voo $voo;

    public function __construct(int $id, Voo $voo)
    {
        $this->id = $id;
        $this->voo = $voo;
    }



    public function getId() : int
    {
        return $this->id;
    }

    public function getVoo() : Voo
    {
        return $this->voo;
    }
}