<?php
// relatorios/getData.php

header('Content-Type: application/json');

// Simulação de dados que seriam puxados do banco de dados
$data = [
    'emAndamento' => 25,
    'concluidos' => 12,
    'emApelacao' => 8,
    'arquivados' => 5
];

// Retorna os dados em formato JSON
echo json_encode($data);
?>
