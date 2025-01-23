<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Últimas Notícias</h1>

    <!-- Formulário de Filtro e Pesquisa -->
    <form method="get" action="<?= site_url('noticias') ?>" class="mb-3">
    <div class="row">
        <div class="col-md-4">
        <label for="start_date">Palavra Chave</label>
            <input type="text" name="search" class="form-control" placeholder="Pesquisar por palavra-chave..." value="<?= esc($search ?? '') ?>">
        </div>
        <div class="col-md-2">
            <label for="start_date">Data Início</label>
            <input type="date" id="start_date" name="start_date" class="form-control" value="<?= esc($start_date ?? '') ?>">
        </div>
        <div class="col-md-2">
            <label for="end_date">Data Final</label>
            <input type="date" id="end_date" name="end_date" class="form-control" value="<?= esc($end_date ?? '') ?>">
        </div>
        <div class="col-md-2 align-self-end">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
    </div>
</form>


    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <a href="<?= site_url('noticias/cadastrar') ?>" class="btn btn-success mb-3">Cadastrar Nova Notícia</a>

    <?php if (!empty($noticias)): ?>
        <ul class="list-group">
            <?php foreach ($noticias as $noticia): ?>
                <li class="list-group-item">
                    <h5><?= esc($noticia['titulo']) ?></h5>
                    <p><?= esc($noticia['conteudo']) ?></p>
                    <small><strong>Data:</strong> <?= date('d/m/Y', strtotime($noticia['data'])) ?></small>

                    <?php if (!empty($noticia['imagem'])): ?>
    <img src="<?= base_url($noticia['imagem']) ?>" alt="Imagem da Notícia" class="img-fluid">
<?php endif; ?>


                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Sem notícias cadastradas.</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
