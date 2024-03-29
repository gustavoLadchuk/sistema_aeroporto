<?php
namespace Gustafl\Aeroporto;

function cls()                                                                                                             
{
    print("\033[2J\033[;H");
}

$lista = new ListaVoos();

do {
    echo '========== INTEGRATED AIRLINES ==========' . PHP_EOL;
    echo 'Selecione o usuário: ' . PHP_EOL .
         '[1] Admin' . PHP_EOL .
         '[2] Cliente' . PHP_EOL;
    $user = readline();
    cls();
    if ($user != 1 && $user != 2){
        echo 'Usuário inválido ' . PHP_EOL;
    }else{
        menu($user);
    }
}while($user != 1 && $user != 2);

function menu($user)
{
    if ($user == 1){

        echo 'Bem-vindo, Admin!' . PHP_EOL;
        echo 'Selecione uma operação: ' . PHP_EOL .
             '[1] Gerenciar voos' . PHP_EOL .
             '[2] Gerenciar aeronaves' . PHP_EOL .
             '[3] Gerenciar tripulantes' . PHP_EOL .
             '[4] Gerenciar aeroportos' . PHP_EOL .
             '[0] Fechar sistema' . PHP_EOL;
        $operacao = readline();

        switch($operacao){
            
        }
    
}



}

function gerenciarVoos()
{
    echo 'Selecione uma operação: ' . PHP_EOL .
    '[1] Adicionar novo voo' . PHP_EOL .
    '[0] Retornar' . PHP_EOL;
}





?>
