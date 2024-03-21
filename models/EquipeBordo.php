<?php

class EquipeBordo {

    private int $id;
    private Funcionario $piloto;
    private Funcionario $copiloto;
    private Funcionario $comissarioDeBordo;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function setFuncionario(Funcionario $funcionario){
        if ($funcionario->getCargo() == 'PILOTO' && $this->piloto == null)
        {
            $this->piloto = $funcionario;
        }else if ($funcionario->getCargo() == 'COPILOTO' && $this->copiloto == null)
        {
            $this->copiloto = $funcionario;
        }else if ($funcionario->getCargo() == 'COMISSARIO DE BORDO' && $this->comissarioDeBordo == null){
            $this->comissarioDeBordo = $funcionario;
        }else{
            echo 'Não foi possível adicionar o funcionário à equipe';
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

    public function getComissario() : Funcionario 
    {
        return $this->comissarioDeBordo;
    }

   
}