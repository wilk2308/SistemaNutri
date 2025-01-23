<!-- application/views/asaas_view.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibição de Resultado do Asaas</title>
</head>
<body>

    <h2>Resultado da API do Asaas</h2>

    <?php if (!empty($resultado_api)): ?>
        <p>ID da Cobrança: <?php echo $resultado_api['id']; ?></p>
        <p>Cliente: <?php echo $resultado_api['customer']; ?></p>
        <!-- Adicione mais campos conforme necessário -->
    <?php else: ?>
        <p>Nenhum resultado da API disponível.</p>
    <?php endif; ?>

</body>
</html>
