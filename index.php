<?php
namespace Gustafl\Aeroporto;

require_once 'vendor/autoload.php';


//banco de dados
$aeronaves = [];

$aeroportos = [];
$pistas = [];

$tripulantes = [];

$passageiros = [];
$bagagens = [];

$voos = [];

//criação de dados para simulação

//aeronaves
array_push($aeronaves, 
new Aeronave('Boeing 777', Tamanho::GRANDE, new Capacidade(100, 10000, 50000)));

array_push($aeronaves, 
new Aeronave('Airbus A380', Tamanho::MEDIO, new Capacidade(80, 7000, 30000)));

array_push($aeronaves, 
new Aeronave('Boeing 787', Tamanho::PEQUENO, new Capacidade(65, 5000, 10000)));

//aeroportos

array_push($aeroportos, new Aeroporto('Aeroporto Integrado',
new Local('Brasil', 'Paraná', 'Cascavel')));

$aeroportos[0]->setCoordenadas( -24.9550, -53.4558);

array_push($aeroportos, new Aeroporto('Los Angeles Airlines',  
new Local('Estados Unidos', 'Califórnia', 'Los Angeles')));

$aeroportos[1]->setCoordenadas(34.0522, -118.2437);

$aeroportos[0]->addPista(new Pista(1, Tamanho::GRANDE));
$aeroportos[0]->addPista(new Pista(2, Tamanho::MEDIO));
$aeroportos[0]->addPista(new Pista(3, Tamanho::PEQUENO));

$aeroportos[1]->addPista(new Pista(4, Tamanho::GRANDE));
$aeroportos[1]->addPista(new Pista(5, Tamanho::MEDIO));
$aeroportos[1]->addPista(new Pista(6, Tamanho::PEQUENO));

$aeroportos[0]->addGalpao(new Galpao(1, 10));
$aeroportos[1]->addGalpao(new Galpao(2, 10));

$aeroportos[0]->addAeronave($aeronaves[0]);
$aeroportos[0]->addAeronave($aeronaves[1]);
$aeroportos[1]->addAeronave($aeronaves[2]);

//preparacao da aeronave

$aeroportos[0]->levarParaGalpao($aeronaves[0], $aeroportos[0]->getGalpoes()[0]);

$aeronaves[0]->setManutencao(true);

$aeronaves[0]->abastecer($aeronaves[0]->getCapacidade()->getCombustivel());

$aeronaves[0]->setManutencao(false);

$aeronaves[0]->disponibilizar();

$aeronaves[0]->prepararParaVoo($aeroportos[0]->getPistas()[0]);


//tripulantes

array_push($tripulantes,
new Piloto('Ivan Pereira', Genero::MASCULINO, 1234567890, 75, 500, 
new Local('Brasil', 'São Paulo', 'São Paulo'), 50000));

array_push($tripulantes,
new Piloto('Gerson Medeiros', Genero::MASCULINO, 1987654321, 80, 357, 
new Local('Brasil', 'São Paulo', 'Guarulhos'), 30000));

array_push($tripulantes,
new Comissario('Maria da Silva', Genero::FEMININO, 1029384756, 67, 25000, true, 5));

$tripulantes[2]->addIdioma('Inglês');
$tripulantes[2]->addIdioma('Espanhol');

//passageiros

array_push($passageiros,
new Passageiro('Adilson Marques', Genero::MASCULINO, 1003284756, 80));

$passageiros[0]->addBagagem(new Bagagem(1, 35));

array_push($passageiros,
new Passageiro('Marcia Ferreira', Genero::FEMININO, 1038472187, 68));

$passageiros[1]->addBagagem(new Bagagem(2, 30));

array_push($passageiros,
new Passageiro('Sérgio da Costa', Genero::MASCULINO, 1923849342, 87));

$passageiros[2]->addBagagem(new Bagagem(3, 45));
$passageiros[2]->addBagagem(new Bagagem(4, 20));

array_push($passageiros,
new Passageiro('Beatriz Souza', Genero::FEMININO, 1937458920, 95));

$passageiros[3]->addBagagem(new Bagagem(5, 40));

array_push($passageiros,
new Passageiro('João Vitor', Genero::MASCULINO, 8523450198, 73));

$passageiros[4]->addBagagem(new Bagagem(6, 15));
$passageiros[4]->addBagagem(new Bagagem(7, 20));

array_push($passageiros,
new Passageiro('Ana Vitória', Genero::FEMININO, 98237590102, 98));

$passageiros[0]->addBagagem(new Bagagem(8, 17));
$passageiros[0]->addBagagem(new Bagagem(9, 23));

//voos

array_push(
    $voos, 
    new Voo(
        1, 
        $aeronaves[0],
        $aeroportos[0], 
        $aeroportos[1], 
        new Tempo(9, 30, 0),
        new EquipeBordo($tripulantes[0], $tripulantes[1], $tripulantes[2])
        )
    );

//inicio do voo

$voos[0]->disponibilizarVoo();

foreach ($passageiros as $passageiro){
    $passageiro->comprarPassagem($voos[0]);
    $passageiro->fazerCheckIn($passageiro->getPassagem(), $voos[0]);
    echo $voos[0]->embarcarPassageiro($passageiro);
}

echo $aeronaves[0]->embarcarEquipeBordo($voos[0]->getEquipeBordo());

//processo de voo

$aeronaves[0]->voar($voos[0]);

//finalização do voo

$aeronaves[0]->pousar($voos[0]);

foreach ($passageiros as $passageiro){
     echo $voos[0]->desembarcarPassageiro($passageiro);
}

$aeroportos[1]->levarParaGalpao($aeronaves[0], $aeroportos[1]->getGalpoes()[0]);


function cls()                                                                                                             
{
    print("\033[2J\033[;H");
}

cls();
$retorno = false;

    do{
    echo '========== INTEGRATED AIRLINES ==========' . PHP_EOL;
    echo 'Selecione uma operação: ' . PHP_EOL .
            '[1] Gerenciar voos' . PHP_EOL .
            '[2] Gerenciar aeronaves' . PHP_EOL .
            '[3] Gerenciar tripulantes' . PHP_EOL .
            '[4] Gerenciar aeroportos' . PHP_EOL .
            '[5] Gerenciar passageiros' . PHP_EOL .
            '[0] Fechar sistema' . PHP_EOL;
        $operacao = readline();
        cls();
        
       if ($operacao == 0){
        $retorno = false;
       }else if ($operacao > 0 && $operacao <= 5){
        $retorno = operacoes($operacao);
       }else{
        $retorno = true;
       }
    }while($retorno);


function operacoes(int $operacao) : bool{

    global $voos;
    global $aeronaves;
    global $tripulantes;
    global $aeroportos;
    global $passageiros;

    $tamanhoLista = 0;
    $retorno = false;

    $nomeOperacao = '';
    switch ($operacao){
        case 1:
            $nomeOperacao = 'voo';
        break;
        case 2:
            $nomeOperacao = 'aeronave';
        break;
        case 3:
            $nomeOperacao = 'tripulante';
        break;
        case 4:
            $nomeOperacao = 'aeroporto';
        break;
        case 5:
            $nomeOperacao = 'passageiros';
        break;
    }
    do {
    echo 'Selecione uma operação: ' . PHP_EOL .
    '[1] Adicionar ' . $nomeOperacao . PHP_EOL;
    
        switch ($operacao){
            case 1:
            foreach($voos as $voo){
                echo '[' . (array_search($voo, $voos) + 2) . '] ' . 
                'Voo n° ' . $voo->getId() . ' : ' . 
                $voo->getOrigem()->getNome() . ' -> ' . $voo->getDestino()->getNome() . PHP_EOL;
                $tamanhoLista = sizeof($voos);
            }
            break;       
            case 2:
            foreach($aeronaves as $aeronave){
                echo '[' . (array_search($aeronave, $aeronaves) + 2) . '] ' . 
                $aeronave->getModelo() . PHP_EOL;
                $tamanhoLista = sizeof($aeronaves);
            }
            break;
            case 3:
            foreach($tripulantes as $tripulante){
                echo '[' . (array_search($tripulante, $tripulantes) + 2) . '] ' . 
                $tripulante->getNome() . ' - '. $tripulante->getCargo() . PHP_EOL;
            }
            $tamanhoLista = sizeof($tripulantes);
            break;
            case 4:
            foreach($aeroportos as $aeroporto){
                echo '[' . (array_search($aeroporto, $aeroportos) + 2) . '] ' . 
                $aeroporto->getNome() . ' - '. $aeroporto->getLocalizacao()->getCidade() 
                . ', ' . $aeroporto->getLocalizacao()->getEstado() . PHP_EOL;
            }
            $tamanhoLista = sizeof($aeroportos);
            break;
            case 5:
                foreach($passageiros as $passageiro){
                    echo '[' . (array_search($passageiro, $passageiros) + 2) . '] ' . 
                    $passageiro->getNome(). PHP_EOL;
                    $tamanhoLista = sizeof($passageiros);
        }
        break;
    }

    echo '[0] Retornar' . PHP_EOL;
    $selecao = readline();
    cls();  

    if ($selecao == 0){
        return true;
       }else if($selecao == 1){
        $retorno = criarElemento($operacao);
       }
       else if ($selecao > 1 && $selecao <= ($tamanhoLista + 2)){
       $retorno = verificarElemento($selecao, $operacao);
       }else{
        $retorno = true;
       }
    }while($retorno);
}


function verificarElemento(int $selecao, int $operacao) : bool{

    global $voos;
    global $aeronaves;
    global $tripulantes;
    global $aeroportos;
    global $passageiros;

    switch ($operacao){
        case 1:
        //voo
        echo 
        'ID: ' . $voos[$selecao - 2]->getId() . PHP_EOL .
        'Aeronave: ' . $voos[$selecao - 2]->getAeronave()->getModelo() . PHP_EOL .
        'Origem: ' . $voos[$selecao - 2]->getOrigem()->getNome() . PHP_EOL .
        'Destino: ' . $voos[$selecao - 2]->getDestino()->getNome() . PHP_EOL .
        'Horario: ' . $voos[$selecao - 2]->getHorario()->horarioToString(false) . PHP_EOL .
        'Distância: ' . $voos[$selecao - 2]->getDistancia('kilometros') . 'km' . PHP_EOL .
        'Tempo estimado de voo: ' . $voos[$selecao - 2]->getTempoVoo()  . ' Horas'. PHP_EOL .
        'Consumo estimado de combustível: ' . $voos[$selecao - 2]->getConsumoCombustivel() . ' Litros' . PHP_EOL .
        'Equipe de bordo:'. PHP_EOL .
         ' - Piloto(a): ' . $voos[$selecao - 2]->getEquipeBordo()->getPiloto()->getNome() . PHP_EOL .
         ' - Copiloto(a): ' . $voos[$selecao - 2]->getEquipeBordo()->getCopiloto()->getNome() . PHP_EOL .
         ' - Comissário(a): ' . $voos[$selecao - 2]->getEquipeBordo()->getComissario()->getNome() . PHP_EOL .
        'Passageiros: '. sizeof($voos[$selecao - 2]->getPassageiros()) . PHP_EOL .
        'Status: ' . $voos[$selecao - 2]->getStatus()->value . PHP_EOL;
        
        break;       
        case 2:
        //aeronave
        echo
        'Modelo: ' . $aeronaves[$selecao - 2]->getModelo() . PHP_EOL . 
        'Tamanho: ' . $aeronaves[$selecao - 2]->getTamanho()->name . PHP_EOL . 
        'Passageiros: ' . $aeronaves[$selecao - 2]->getQuantidadePassageirosEmbarcados() . '/' . 
        $aeronaves[$selecao - 2]->getCapacidade()->getPassageiros() . PHP_EOL . 
        'Combustível: ' . $aeronaves[$selecao - 2]->getCombustivelRestante() . '/' . 
        $aeronaves[$selecao - 2]->getCapacidade()->getCombustivel() . PHP_EOL . 
        'Carga: ' . $aeronaves[$selecao - 2]->getPesoDeCarga() . '/' . 
        $aeronaves[$selecao - 2]->getCapacidade()->getPesoMaximo() . PHP_EOL .
        'Status: ' . $aeronaves[$selecao - 2]->getStatus()->value . PHP_EOL;

        
        break;
        case 3:
        //tripulante
        echo
        'Nome: ' . $tripulantes[$selecao - 2]->getNome() . PHP_EOL .
        'Genero: ' . $tripulantes[$selecao - 2]->getGenero()->value . PHP_EOL .
        'CPF: ' . $tripulantes[$selecao - 2]->getCpf() . PHP_EOL .
        'Peso: ' . $tripulantes[$selecao - 2]->getPeso() . ' kg' . PHP_EOL .
        'Salário: ' . 'R$' . $tripulantes[$selecao - 2]->getSalario() . PHP_EOL .
        'Cargo: ' . $tripulantes[$selecao - 2]->getCargo() . PHP_EOL;

        if ($tripulantes[$selecao - 2]->getCargo() == 'pilot' . $tripulantes[$selecao - 2]->getSufixoGenero())
        {
            echo
            'Horas de voo: ' . $tripulantes[$selecao - 2]->getHorasDeVoo() . ' Horas'. PHP_EOL . 
            'Base de operações: ' . $tripulantes[$selecao - 2]->getBaseDeOperacoes()->getCidade() . PHP_EOL;
        }else{
            echo 'Idiomas: ' . $tripulantes[$selecao - 2]->getIdiomasString() . PHP_EOL .
            'Treinamento de emergência: ' . 
            $tripulantes[$selecao - 2]->getTreinamentoEmergenciaString() . PHP_EOL .
            'Anos de experiência: ' . $tripulantes[$selecao - 2]->getAnosDeExperiencia() . ' Anos' . PHP_EOL;  
        }
        
        break;
        case 4:
        //aeroporto
        echo
        'Nome: ' . $aeroportos[$selecao - 2]->getNome() . PHP_EOL . 
        'Localização: ' . $aeroportos[$selecao - 2]->localizacaoToString() . PHP_EOL .
        'Aeronaves: ' . sizeof($aeroportos[$selecao - 2]->getAeronaves()) . PHP_EOL .
        'Pistas: ' . sizeof($aeroportos[$selecao - 2]->getPistas()) . PHP_EOL .
        'Galpões: ' . sizeof($aeroportos[$selecao - 2]->getGalpoes()) . PHP_EOL;
        break;

        case 5:
        //passageiros
        echo
        'Nome: ' . $passageiros[$selecao - 2]->getNome() . PHP_EOL .
        'Genero: ' . $passageiros[$selecao - 2]->getGenero()->value . PHP_EOL .
        'CPF: ' . $passageiros[$selecao - 2]->getCpf() . PHP_EOL .
        'Peso: ' . $passageiros[$selecao - 2]->getPeso() . ' kg' . PHP_EOL .
        'Bagagens: ' . sizeof($passageiros[$selecao - 2]->getBagagens()) . PHP_EOL .
        'Status: ' . $passageiros[$selecao - 2]->getStatus()->value . PHP_EOL;
        break;
    }

    echo '[0] Retornar' . PHP_EOL;
    $operacao = readline();

    cls();
    if ($operacao == 0){
        return true;
    }
    
}

function criarElemento($operacao)
{

    global $voos;
    global $aeronaves;
    global $tripulantes;
    global $aeroportos;
    global $passageiros;


    switch ($operacao){
        case 1:
            //voo
            echo 'Insira o ID do voo:' . PHP_EOL;
            $id = readline();
            cls();

            echo 'Selecione a aeronave: ' . PHP_EOL;
            foreach($aeronaves as $aeronave){
                echo '[' . (array_search($aeronave, $aeronaves)) . '] ' . 
            $aeronave->getModelo() . PHP_EOL;
            }
            $selecaoAeronave = readline();
            cls();

            echo 'Selecione um aeroporto de origem: ' . PHP_EOL;
           foreach($aeroportos as $aeroporto){
            echo '[' . (array_search($aeroporto, $aeroportos)) . '] ' . 
            $aeroporto->getNome() . ' - '. $aeroporto->getLocalizacao()->getCidade() 
            . ', ' . $aeroporto->getLocalizacao()->getEstado() . PHP_EOL;
            }
            $origem = readline();
            cls();

            echo 'Selecione um aeroporto de Destino: ' . PHP_EOL;
            foreach($aeroportos as $aeroporto){
             echo '[' . (array_search($aeroporto, $aeroportos)) . '] ' . 
             $aeroporto->getNome() . ' - '. $aeroporto->getLocalizacao()->getCidade() 
             . ', ' . $aeroporto->getLocalizacao()->getEstado() . PHP_EOL;
             }
             $destino = readline();
             cls();

            echo 'Insira a hora do voo:' . PHP_EOL;
            $hora = readline();
            cls();

            echo 'Insira o minuto do voo' . PHP_EOL;
            $minuto = readline();
            cls();

           $pilotos = [];
           $comissarios = [];
            foreach ($tripulantes as $tripulante){
                if ($tripulante->getCargo() == 'pilot' . $tripulante->getSufixoGenero()){
                    array_push($pilotos, $tripulante);
                }else{
                    array_push($comissarios, $tripulante);
                }
            }

            echo 'Selecione o piloto: ' . PHP_EOL;
            foreach ($pilotos as $piloto){
                echo '[' . array_search($piloto, $pilotos) . '] ' . $piloto->getNome() . PHP_EOL;
            }
            $selecaoPiloto = readline();
            cls();

            echo 'Selecione o copiloto: ' . PHP_EOL;
            foreach ($pilotos as $piloto){
                if ($piloto != $pilotos[$selecaoPiloto])
                echo '[' . array_search($piloto, $pilotos) . '] ' . $piloto->getNome() . PHP_EOL;
            }
            $selecaoCopiloto = readline();
            cls();

            echo 'Selecione o comissario: ' . PHP_EOL;
            foreach ($comissarios as $comissario){
                echo '[' . array_search($comissario, $comissarios) . '] ' . $comissario->getNome() . PHP_EOL;
            }
            $selecaoComissario = readline();
            cls();

            array_push($voos, new Voo(
                $id, 
                $aeronaves[$selecaoAeronave], 
                $aeroportos[$origem], 
                $aeroportos[$destino], 
                new Tempo($hora, $minuto, 0),
                new EquipeBordo(
                    $pilotos[$selecaoPiloto], 
                    $pilotos[$selecaoCopiloto], 
                    $comissarios[$selecaoComissario]
                    )
                )
            );
        break;
        case 2:
            //aeronave
            echo 'Insira o modelo da aeronave: ' . PHP_EOL;
            $modelo = readline();
            cls();

            echo 'Insira a capacidade máxima de passageiros dessa aeronave: ' . PHP_EOL;
            $numeroPassageiros = readline();
            cls();

            echo 'Insira a capacidade máxima de combustível dessa aeronave: ' . PHP_EOL;
            $combustivel = readline();
            cls(); 

            echo 'Insira a capacidade máxima de peso em kg dessa aeronave: ' . PHP_EOL;
            $peso = readline();
            cls();

            echo 'Selecione o tamanho dessa aeronave: ' . PHP_EOL .
            '[1] Grande' . PHP_EOL .
            '[2] Médio' . PHP_EOL .
            '[3] Pequeno' . PHP_EOL;
            $selecaoTamanho = readline();
            cls();

            switch ($selecaoTamanho){
                case 1:
                $tamanho = Tamanho::GRANDE;
                break;

                case 2:
                $tamanho = Tamanho::MEDIO;
                break;

                case 3:
                $tamanho = Tamanho::PEQUENO;
                break;
            }

            $capacidade = new Capacidade($numeroPassageiros, $combustivel, $peso);

            array_push($aeronaves, new Aeronave($modelo, $tamanho, $capacidade));
            
        break;
        case 3:
            //tripulante
            echo 'Insira o nome do tripulante: ' . PHP_EOL;
            $nome = readline();
            cls();
            
            echo 'Selecione o gênero do tripulante: ' . PHP_EOL .
            '[1] Masculino' . PHP_EOL . 
            '[2] Feminino' . PHP_EOL;
            $selecaoGenero = readline();
            if ($selecaoGenero == 1){
                $genero = Genero::MASCULINO;
            }else{
                $genero = Genero::FEMININO;
            }
            cls();

            echo 'Insira o CPF do tripulante: ' . PHP_EOL;
            $cpf = readline();
            cls();

            echo 'Insira o peso em kg do tripulante: ' . PHP_EOL;
            $peso = readline();
            cls();

            echo 'Insira o salário do tripulante: ' . PHP_EOL;
            $salario = readline();
            cls();

            echo 'Selecione o cargo do tripulante: ' . PHP_EOL . 
            '[1] Piloto' . PHP_EOL . 
            '[2] Comissário' . PHP_EOL;
            $cargo = readline();
            cls();

            if ($cargo == 1){
                echo 'Insira a quantidade de horas de voo do piloto: ' . PHP_EOL;
                $horasVoo = readline();
                cls();

                echo 'Insira a cidade da base de operações do piloto: ' . PHP_EOL;
                $cidade = readline();
                cls();

                echo 'Insira o estado da base de operações do piloto: ' . PHP_EOL;
                $estado = readline();
                cls();

                echo 'Insira o país da base de operações do piloto: ' . PHP_EOL;
                $pais = readline();
                cls();

                array_push($tripulantes, new Piloto($nome, $genero, $cpf, $peso, $horasVoo,
                new Local($pais, $estado, $cidade), $salario));
            }else{
                echo 'O comissário possui treinamento de emergência? ' . PHP_EOL . 
                '[1] Sim' . PHP_EOL . 
                '[2] Não' . PHP_EOL;
                $selecaoTreinamento = readline();
                cls();

                if ($selecaoTreinamento == 1){
                    $treinamento = true;
                }else{
                    $treinamento = false;
                }

                echo 'Insira a quantidade de anos de experiência do comissário: ' . PHP_EOL;
                $experiencia = readline();
                cls();

                array_push($tripulantes, 
                new Comissario($nome, $genero, $cpf, $peso, $salario, $treinamento, $experiencia));

            }



        break;
        case 4:
            //aeroporto
            echo 'Insira o país onde esse aeroporto está localizado: ' . PHP_EOL;
            $pais = readline();
            cls();

            echo 'Insira o estado onde esse aeroporto está localizado: ' . PHP_EOL;
            $estado = readline();
            cls();

            echo 'Insira o cidade onde esse aeroporto está localizado: ' . PHP_EOL;
            $cidade = readline();
            cls();

            echo 'Insira o nome do aeroporto: ' . PHP_EOL;
            $nome = readline();
            cls();

            $local = new Local($pais, $estado, $cidade);
            array_push($aeroportos, new Aeroporto($nome, $local));
        break;
        case 5:
            //passageiro
            echo 'Insira o nome do passageiro: ' . PHP_EOL;
            $nome = readline();
            cls();
            
            echo 'Selecione o gênero do passageiro: ' . PHP_EOL .
            '[1] Masculino' . PHP_EOL . 
            '[2] Feminino' . PHP_EOL;
            $selecaoGenero = readline();
            if ($selecaoGenero == 1){
                $genero = Genero::MASCULINO;
            }else{
                $genero = Genero::FEMININO;
            }
            cls();

            echo 'Insira o CPF do passageiro: ' . PHP_EOL;
            $cpf = readline();
            cls();

            echo 'Insira o peso em kg do passageiro: ' . PHP_EOL;
            $peso = readline();
            cls();

            array_push($passageiros, new Passageiro($nome, $genero, $cpf, $peso));

        break;
        } 

        return true;

}