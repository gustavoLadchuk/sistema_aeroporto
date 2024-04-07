<?php

namespace Gustafl\Aeroporto;

class Passageiro extends Pessoa
{


    private Passagem $passagem;
    private array $bagagens;
    private Status $status;



    public function __construct(string $nome, Genero $genero, int $cpf, float $peso)
    {
        parent::__construct($nome, $genero, $cpf, $peso);
        $this->status = Status::NAO_EMBARCADO;
        $this->bagagens = [];
    }



    public function fazerCheckIn(Passagem $passagem, Voo $voo): string
    {
        if ($passagem->getVoo() == $voo && $passagem->getValidade()) {
            $this->status = Status::CHECKIN;

            foreach ($this->bagagens as $bagagem) {
                $bagagem->despachar();
            }
            return 'O Check In foi feito com sucesso';
        }
        return 'Não foi possível fazer Check in';
    }

    public function addBagagem(Bagagem $bagagem): void
    {
        array_push($this->bagagens, $bagagem);
    }

    public function recolherBagagens(): string
    {
        if ($this->status == Status::NAO_EMBARCADO) {
            foreach ($this->bagagens as $bagagem) {
                $bagagem->coletar();
            }
            return 'O passageiro recolheu suas bagagens';
        }
        return 'Não foi possível recolher as bagagens';
    }


    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    public function comprarPassagem(Voo $voo): string
    {
        if ($voo->getStatus() == Status::DISPONIVEL) {
            $voo->addPassageiros($this);
            $this->passagem = new Passagem(rand(0, 99999), $voo);
            return 'Passagem comprada com sucesso';
        }
        return 'Não foi possível comprar a passagem';
    }

    public function getPassagem(): Passagem
    {
        return $this->passagem;
    }

    public function getBagagens(): array
    {
        return $this->bagagens;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }
}
