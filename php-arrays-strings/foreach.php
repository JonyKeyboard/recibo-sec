<?php

$conta1 = [
    'titular' => 'Vinicius',
    'saldo' => 1000
];

$contasCorrentes = [
    '123.456.789-10' => [
        $conta1
    ],
    '123.456.789-11' => [
        'titular' => 'Maria',
        'saldo' => 10000
    ],
    '123.256.789-12' => [
    'titular' => 'Pedrinho',
    'saldo' => 300
    ]
];

$contasCorrentes['783.256.789-45'] = [
    'titular' => 'João',
    'saldo' => 2000
];

foreach ($contasCorrentes as $cpf => $conta) {
    echo $cpf . " " . $conta['saldo'] . PHP_EOL;
}