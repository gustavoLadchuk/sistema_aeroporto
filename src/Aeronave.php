<?php

namespace Gustafl\Aeroporto;

class Aeronave
{

    private string $modelo;
    private Tamanho $tamanho;
    private Capacidade $capacidade;
    private Status $status;
    private Estrutura $localDaAeronave;
    private EquipeBordo $equipeBordo;
    private float $combustivelRestante;
    private float $pesoDeCarga;
    private array $passageirosEmbarcados;


    public function __construct(string $modelo, Tamanho $tamanho, Capacidade $capacidade)
    {
        $this->modelo = $modelo;
        $this->tamanho = $tamanho;
        $this->capacidade = $capacidade;
        $this->status = Status::INATIVO;

        $this->combustivelRestante = 0;
        $this->pesoDeCarga = 0;
        $this->passageirosEmbarcados = [];
    }

   
           
        
    

    public function adicionarPesoDeCarga(float $peso)
    {
        $this->pesoDeCarga += $peso;
    }

    public function editarStatus(Status $status): void
    {
        $this->status = $status;
    }

    public function calcularPesoDeCarga() {
        $peso = 0;
        foreach ($this->passageirosEmbarcados as $passageiro){
            foreach($passageiro->getBagagens() as $bagagem){
                $peso += $bagagem->getPeso();
            }
            $peso += $passageiro->getPeso();
        }
        if ($this->status == Status::PRONTO_PARA_VOO)
        {
            $peso += $this->equipeBordo->getPiloto()->getPeso();
            $peso += $this->equipeBordo->getCopiloto()->getPeso();
            $peso += $this->equipeBordo->getComissario()->getPeso();
        }

        $this->pesoDeCarga = $peso;
    }

    public function setGalpao(Galpao $galpao)
    {
        $this->localDaAeronave = $galpao;
    }

    public function setManutencao(bool $manutencao)
    {
        if ($manutencao && $this->status == Status::INDISPONIVEL){
            $this->status = Status::EM_MANUTENCAO;
        }else{
            $this->status = Status::INDISPONIVEL;
        }
    }

    public function abastecer(int $quantidade) : string
    {
        if ($this->status == Status::EM_MANUTENCAO){
            if ($quantidade <= ($this->capacidade->getCombustivel() - $this->combustivelRestante))
            {
                $this->combustivelRestante += $quantidade;
                return 'Aeronave abastecida com sucesso';
            }
            return 'Quantidade acima do limite de combustível';
        }
        return 'A aeronave não pode abastecer';
    }

    public function disponibilizar() : string
    {
        if ($this->status == Status::INDISPONIVEL){
            $this->status = Status::DISPONIVEL;
            return 'A aeronave está disponível';
        }
        return 'Não foi possível disponibilizar a aeronave';
    }

    public function prepararParaVoo(Pista $pista): string
    {
        if ($this->status == Status::DISPONIVEL) {

            if ($pista->getTamanho()->value <= $this->tamanho->value) {
                $this->localDaAeronave = $pista;
                $this->status = Status::EMBARCANDO;
                return 'A aeronave está pronta para embarcar passageiros';
            } 
            return 'A aeronave é grande demais para essa pista';
        }
            return 'Essa aeronave não está disponível para ser utilizada';
    } 

    public function addPassageiro(Passageiro $passageiro) : string
    {
        if ($this->status == Status::EMBARCANDO){
            array_push($this->passageirosEmbarcados, $passageiro);
            $this->calcularPesoDeCarga();

            return 'O passageiro embarcou no avião';
        }
        return 'Não foi possível embarcar o passageiro';
        
    }

    public function embarcarEquipeBordo(EquipeBordo $equipe)
    {
        if ($this->status == Status::EMBARCANDO){
            $this->equipeBordo = $equipe;
            $this->calcularPesoDeCarga();
            $this->status = Status::PRONTO_PARA_VOO;

            return 'A equipe embarcou na aeronave';
        }
        return 'Não foi possível embarcar a equipe';
    }

   

    public function voar(Voo $voo) : string
    {
        if ($this->status == Status::PRONTO_PARA_VOO){ 
            $this->status = Status::EM_VOO;
            $voo->getOrigem()->removeAeronave($this);
            return $voo->iniciarVoo();
        }
        return 'Não foi possivel iniciar o voo';
    }

    public function pousar(Voo $voo) : string
    {
        if ($this->status == Status::EM_VOO)
        {
            $this->combustivelRestante -= $voo->getConsumoCombustivel();
            $this->status = Status::DESEMBARCANDO;
            $voo->getDestino()->addAeronave($this);
            return $voo->finalizarVoo();
        }
        return 'Não foi possível pousar';
    }

    public function removePassageiro(Passageiro $passageiro) : string
    {
        if ($passageiro->getStatus() == Status::EMBARCADO && $this->status == Status::DESEMBARCANDO)
        {
            array_splice(
                $this->passageirosEmbarcados, 
                array_search($passageiro,$this->passageirosEmbarcados),
                1
            );
            $this->calcularPesoDeCarga();
            $passageiro->setStatus(Status::NAO_EMBARCADO);
            return 'O passageiro desembarcou';
        }
        return 'Não foi possível desembarcar o passageiro';
    }



    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function getCapacidade(): Capacidade
    {
        return $this->capacidade;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getLocalAeronave(): Estrutura
    {
        return $this->localDaAeronave;
    }

    public function getCombustivelRestante(): float
    {
        return $this->combustivelRestante;
    }

    public function getPesoDeCarga(): float
    {
        return $this->pesoDeCarga;
    }

    public function getPassageirosEmbarcados() : array
    {
        return $this->passageirosEmbarcados;
    }

    public function getQuantidadePassageirosEmbarcados(): int
    {
        return sizeof($this->passageirosEmbarcados);
    }

    public function getTamanho(): Tamanho
    {
        return $this->tamanho;
    }
}
