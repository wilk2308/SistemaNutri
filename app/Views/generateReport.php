<?php
// generateReport.php

// Função para gerar relatório
function generateReport() {
    // Simulação de geração de relatório
    $reportData = "Relatório Gerado: " . date("Y-m-d H:i:s") . "\n";
    
    // Salvar o relatório em um arquivo
    $fileName = 'relatorios/relatorio_' . date('Y_m_d_H_i_s') . '.txt';
    file_put_contents($fileName, $reportData);
    
    echo "Relatório gerado com sucesso em " . $fileName;
}

// Chama a função para gerar o relatório
generateReport();
?>
