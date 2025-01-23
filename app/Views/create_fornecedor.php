<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Fornecedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Paleta de Cores */
        :root {
            --azul: #071B33;
            --dourado: #CCB178;
            --branco: #FFFFFF;
        }

        body {
            background-color: var(--branco);
            color: var(--azul);
        }

        .btn-success {
            background-color: var(--azul);
            border-color: var(--azul);
        }

        .btn-success:hover {
            background-color: var(--dourado);
            border-color: var(--dourado);
            color: var(--azul);
        }

        .btn-secondary {
            background-color: var(--dourado);
            border-color: var(--dourado);
            color: var(--azul);
        }

        .btn-secondary:hover {
            background-color: var(--azul);
            border-color: var(--azul);
            color: var(--branco);
        }

        label {
            color: var(--azul);
        }

        .form-control {
            border: 1px solid var(--dourado);
        }

        .form-control:focus {
            border-color: var(--azul);
            box-shadow: 0 0 5px var(--azul);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Adicionar Novo Fornecedor</h1>
        <form action="/fornecedores/store" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Fornecedor</label>
                <input type="text" class="form-control" id="nome" name="NOME_DO_FORNECEDOR" required>
            </div>
            <div class="mb-3">
                <label for="contrato" class="form-label">Número do Contrato</label>
                <input type="text" class="form-control" id="contrato" name="Nº_CONTRATO">
            </div>
            <div class="mb-3">
                <label for="objeto" class="form-label">Objeto do Contrato</label>
                <textarea class="form-control" id="objeto" name="OBJETO_DO_CONTRATO"></textarea>
            </div>
            <div class="mb-3">
                <label for="assinatura" class="form-label">Data da Assinatura</label>
                <input type="date" class="form-control" id="assinatura" name="DATA_DA_ASSINATURA">
            </div>
            <div class="mb-3">
                <label for="vigencia" class="form-label">Vigência</label>
                <input type="date" class="form-control" id="vigencia" name="VIGÊNCIA">
            </div>
            <div class="mb-3">
                <label for="criticos" class="form-label">Críticos</label>
                <select class="form-control" id="criticos" name="CRITICOS">
                    <option value="SIM">SIM</option>
                    <option value="NÃO">NÃO</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="/fornecedores" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
