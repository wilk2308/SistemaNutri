<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Fornecedores</title>
    <!-- Link do Bootstrap e Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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
            font-family: 'Poppins', sans-serif;
        }

        /* Estilo dos cards */
        .card {
            border-radius: 10px;
            color: var(--branco);
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
        }

        .card-green {
            background: linear-gradient(135deg, #28a745, #71c77a);
        }

        .card-red {
            background: linear-gradient(135deg, #dc3545, #f07376);
        }

        .card-yellow {
            background: linear-gradient(135deg, #ffc107, #ffe57a);
            color: black;
        }

        /* Tabela */
        table tr:hover {
            background-color: #f2f2f2;
        }

        th {
            background-color: var(--azul);
            color: var(--azul);
        }

        td {
            background-color: var(--branco);
            color: var(--azul);
        }

        /* Botões */
        .btn-primary {
            background-color: var(--azul);
            border-color: var(--azul);
        }

        .btn-primary:hover {
            background-color: var(--dourado);
            border-color: var(--dourado);
        }

        .btn-warning {
            background-color: var(--dourado);
            border-color: var(--dourado);
            color: var(--azul);
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-dark {
            background-color: var(--azul);
            border-color: var(--azul);
            color: var(--branco);
        }

        .btn-dark:hover {
            background-color: var(--dourado);
            border-color: var(--dourado);
            color: var(--azul);
        }
        

        /* Botão Flutuante */
        .fab {
            position: fixed;
            bottom: 20px;
            right: 20px;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            background-color: var(--azul);
            color: var(--branco);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .fab:hover {
            background-color: var(--dourado);
            color: var(--azul);
        }

        /* Logo */
        .logo {
            max-height: 280px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Logo -->
        <div class="text-center">
            <img src="/assets/img/logo2.jpg" alt="Logo" class="logo">
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-center">Dashboard de Fornecedores</h1>

            <?php
$user = session()->get('user');

if ($user !== null && isset($user['username'])): ?>
    <div class="text-center">
        <span class="d-block text-gray-600 small">
            Bem-vindo, <?= esc($user['username']); ?>
        </span>
        <!-- Link de Logout -->
        <a href="<?= site_url('logout'); ?>" class="text-primary mt-1 d-block">
            <i class="fas fa-sign-out-alt"></i> Sair
        </a>
    </div>
<?php else: ?>
    <div class="text-center">
        <span class="d-block text-gray-600 small">Olá, Visitante</span>
    </div>
<?php endif; ?>

            <!-- Botão para adicionar um novo fornecedor -->
            <a href="/fornecedores/create" class="btn btn-primary">
                <i class="fas fa-plus"></i> Adicionar Fornecedor
            </a>
        </div>

        <!-- Filtros -->
        <form class="row mb-4">
            <div class="col-md-4">
                <input type="text" class="form-control" name="fornecedor" placeholder="Digite o nome do fornecedor">
            </div>
            <div class="col-md-4">
                <select class="form-control" name="status">
                    <option value="">Status do Contrato</option>
                    <option value="vigente">Vigente</option>
                    <option value="vencido">Vencido</option>
                </select>
            </div>
            <div class="col-md-4 d-flex">
                <input type="date" class="form-control me-2" name="dataInicio">
                <input type="date" class="form-control" name="dataFim">
            </div>
            <div class="col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </div>
        </form>

        <!-- Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card card-green">
                    <h3>Contratos Vigentes</h3>
                    <h2><?= $contratosVigentes ?></h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-red">
                    <h3>Contratos Vencidos</h3>
                    <h2><?= $contratosVencidos ?></h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-yellow">
                    <h3>Contratos Críticos</h3>
                    <h2><?= $contratosCriticos ?></h2>
                </div>
            </div>
        </div>

        <!-- Tabela -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?php if (!empty($fornecedores[0])): ?>
                        <?php foreach (array_keys($fornecedores[0]) as $coluna): ?>
                            <th><?= $coluna ?></th>
                        <?php endforeach; ?>
                        <th>Ações</th> <!-- Coluna para botões -->
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fornecedores as $fornecedor): ?>
                    <tr>
                        <?php foreach ($fornecedor as $valor): ?>
                            <td><?= $valor ?></td>
                        <?php endforeach; ?>
                        <td>
                            <!-- Botão de Editar -->
                            <a href="/fornecedores/edit/<?= $fornecedor['id'] ?>" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <!-- Botão de Apagar -->
                            <form action="/fornecedores/delete/<?= $fornecedor['id'] ?>" method="POST" style="display:inline;">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja apagar este fornecedor?')">
                                    <i class="fas fa-trash"></i> Apagar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Botão Flutuante -->
    <a href="/fornecedores/create" class="fab">
        <i class="fas fa-plus"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
