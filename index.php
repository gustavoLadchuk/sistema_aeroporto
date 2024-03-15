<?php
require_once 'models/Passageiro.php';
require_once 'models/Bagagem.php';

    $passageiro1 = new Passageiro('Fernando da Costa', 'Masculino', '12345678901', 65);
    $bagagem1 = new Bagagem(1, 15);
    $passageiro1->addBagagem($bagagem1);


    echo $passageiro1->getNome();

?>
