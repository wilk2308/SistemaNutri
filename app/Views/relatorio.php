<?= $this->extend('master') ?>

<?= $this->section('title') ?>
Relatórios
<?= $this->endSection() ?>



<?= $this->section('content') ?>

<!-- Botão Gerar Relatórios -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<a href="<?= site_url('relatorio/download') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Gerar relatório</a>     
</div>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Relatórios</h1>
    <div id="dashboard">
        <iframe src="http://192.168.100.2/dash_tv_boca/dashboard_iframe.html" width="100%" height="1020px" style="border:none;"></iframe>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- Nenhum script adicional é necessário, já que o calendário foi removido -->
<?= $this->endSection() ?>
