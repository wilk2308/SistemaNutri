<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Sistema Nutricional - Plataforma' ?></title>

    <!-- Custom fonts for this template-->
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">

    <!-- FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/main.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
/* Estilo Global */
/* Estilo Global */
body {
    background-color: #f9f9f9;
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
}

.container-fluid {
    padding: 20px;
}

h1, h5 {
    font-weight: bold;
}

/* Cartões */
.card {
    border-radius: 15px;
    transition: transform 0.3s ease-in-out;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border: none;
    background-color: #ffffff;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

.card-header {
    font-weight: bold;
    text-transform: uppercase;
    border-radius: 15px 15px 0 0;
    padding: 10px 15px;
    background-color: #50772a;
    color: #ffffff;
}

.card-body {
    padding: 20px;
    background-color: #ffffff;
    color: #333333;
}

/* Ícones nos cartões */
.card-body i {
    display: block;
    margin-bottom: 10px;
    color: #50772a;
    font-size: 2rem;
}

/* Botões */
.btn {
    border-radius: 30px;
    padding: 10px 20px;
    font-weight: bold;
    transition: background-color 0.3s, transform 0.3s;
}

.btn:hover {
    transform: scale(1.05);
}

/* Botões personalizados */
.btn-primary {
    background-color: #73b32a;
    border: none;
    color: #fff;
}

.btn-primary:hover {
    background-color: #50772a;
}

.btn-success {
    background-color: #28a745;
    border: none;
    color: #fff;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
    color: #fff;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-info {
    background-color: #17a2b8;
    border: none;
    color: #fff;
}

.btn-info:hover {
    background-color: #138496;
}

/* Menu Lateral */
.sidebar {
    background-color: #304458;
    height: 100vh;
    color: #ffffff;
    padding: 10px;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

.sidebar .nav-item {
    margin: 10px 0;
}

.sidebar .nav-link {
    color: #ffffff;
    font-weight: bold;
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 8px;
    transition: background-color 0.3s;
}

.sidebar .nav-link:hover {
    background-color: #50772a;
    color: #ffffff;
}

.sidebar .nav-link i {
    margin-right: 10px;
    font-size: 1.2rem;
}

.sidebar .sidebar-heading {
    font-size: 1.1rem;
    text-transform: uppercase;
    margin-top: 20px;
    padding: 10px;
    color: #73b32a;
}

/* Seções */
.text-center {
    margin-bottom: 20px;
}

.row {
    margin-bottom: 30px;
}

footer {
    background-color: #f8f9fa;
    padding: 20px 0;
    margin-top: 30px;
    color: #6c757d;
    font-size: 0.9rem;
    text-align: center;
    border-top: 1px solid #eaeaea;
}

footer p {
    font-size: 1rem;
    color: #5a6268;
}

footer p a {
    color: #007bff;
    text-decoration: none;
}

footer p a:hover {
    text-decoration: underline;
}

footer p:last-child {
    font-size: 0.85rem;
    color: #868e96;
}

/* Frase amigável no footer */
footer p:first-child {
    font-weight: bold;
    font-size: 1.1rem;
    color: #495057;
}

/* Mensagem de boas-vindas no topo */
.header-message {
    text-align: center;
    color: #495057;
    background-color: #eaf7ea;
    padding: 15px;
    border-radius: 10px;
    font-size: 1.2rem;
    margin-bottom: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Gráficos */
canvas {
    max-width: 100%;
    height: auto;
}

/* Responsividade */
@media (max-width: 768px) {
    .card {
        margin-bottom: 20px;
    }

    .sidebar {
        height: auto;
        padding: 20px;
    }

    .sidebar .nav-link {
        font-size: 0.9rem;
        padding: 8px;
    }
}

    </style>
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php echo $this->include('partials/menu') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php 
$user = session()->get('user');
if ($user !== null && isset($user['username'])): ?>
    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
        Bem-vindo, <?= esc($user['username']); ?>
    </span>
<?php else: ?>
    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Olá, Visitante</span>
<?php endif; ?>
                                <img class="img-profile rounded-circle" src="/assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configurações
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Registro de atividades
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php echo $this->renderSection('content') ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pronto para sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Logout" abaixo se estiver pronto para encerrar sua sessão atual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="/assets/js/sb-admin-2.min.js"></script>

    <!-- Calendário -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>

    <!-- Chart.js dashboard -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?= $this->renderSection('scripts') ?>

</body>
</html>
