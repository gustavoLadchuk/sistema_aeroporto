<?php

class EquipeBordo {

    private int $id;
    private Funcionario $piloto;
    private Funcionario $copiloto;
    private Funcionario $servicoBordo;

    public function __construct($id)
    {
        $this->id = $id;
    }


    //TODO simplificar o cadastro de funcionarios a uma funcao
    public function setPiloto(Funcionario $piloto) {
        if ($piloto->getCargo() == 'PILOTO'){
            $this->piloto = $piloto;
        }else{
            echo 'Esse funcionário não é um piloto';
        }
    }

    public function setCopiloto(Funcionario $copiloto) {
        if ($copiloto->getCargo() == 'COPILOTO'){
            $this->copiloto = $copiloto;
        }else{
            echo 'Esse funcionário não é um copiloto';
        }
    }

    public function setServicoBordo(Funcionario $servico) {
        if ($servico->getCargo() == 'SERVIÇO DE BORDO'){
            $this->servicoBordo = $servico;
        }else{
            echo 'Esse funcionário não é do serviço de bordo';
        }
    }

    public function getId() : int 
    {
        return $this->id;
    }

    public function getPiloto() : Funcionario 
    {
        return $this->piloto;
    }

    public function getCopiloto() : Funcionario 
    {
        return $this->copiloto;
    }

    public function getServico() : Funcionario 
    {
        return $this->servicoBordo;
    }

   
}