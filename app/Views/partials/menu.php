<?php
$user = session()->get('user');
?>
<!-- Sidebar -->
<ul class="navbar-nav sidebar" id="accordionSidebar">
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
    <div class="sidebar-brand-icon">
        <img src="/assets/img/logo.png" alt="Logo Sistema Nutricional" />
    </div>
</a>
<br>
<br>
<div class="sidebar-heading">
    Sistema Nutricional
</div>

<br>


    <li class="nav-item active">
        <a class="nav-link" href="<?= site_url('home') ?>">
            <i class="fas fa-home"></i>
            <span>Início</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('agenda') ?>">
            <i class="fas fa-calendar-alt"></i>
            <span>Agenda</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('pacientes') ?>">
            <i class="fas fa-user-friends"></i>
            <span>Pacientes</span>
        </a>
    </li>
</ul>

<!-- End of Sidebar -->

<style>
.sidebar {
    background-color: #A5D6A7; /* Fundo verde claro */
    height: 100vh;
    padding: 10px;
    border-right: 1px solid #ddd;
    padding-top: 30px; /* Espaço adicional no topo do menu */
    overflow: hidden; /* Evita cortes desnecessários */
}


.sidebar .nav-item {
    margin: 15px 0;
}

.sidebar .nav-link {
    display: flex;
    align-items: center;
    font-weight: bold;
    color: #2E7D32; /* Texto verde escuro */
    border-radius: 8px;
    padding: 10px;
    transition: all 0.3s ease;
}

.sidebar .nav-link:hover {
    background-color: #FFFFFF; /* Fundo branco ao passar o mouse */
    color: #2E7D32; /* Texto permanece verde escuro */
}

.sidebar .nav-link i {
    margin-right: 10px;
    font-size: 1.5rem;
}

.sidebar .nav-item.active .nav-link {
    background-color: #FFFFFF; /* Fundo branco */
    color: #2E7D32; /* Texto verde escuro */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.sidebar-brand-icon img {
    max-width: 200px; /* Ajuste o tamanho da logo */
    height: auto; /* Mantém a proporção */
    margin: 20px auto; /* Espaçamento ao redor */
    display: block; /* Centraliza no menu */
}

@media (max-width: 768px) {
    .sidebar {
        height: auto;
        padding: 20px;
    }

    .sidebar .nav-link {
        font-size: 0.9rem;
        padding: 8px;
    }
}


.sidebar-heading {
    text-align: center;
    color: #2E7D32; /* Verde escuro */
    font-size: 1.2rem;
    font-weight: bold;
    margin-top: 10px; /* Espaço após a logo */
}


</style>