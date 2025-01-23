<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Cadastrar Nova Notícia</h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('noticias/salvar') ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= old('titulo') ?>">
    </div>
    <div class="form-group">
        <label for="conteudo">Conteúdo</label>
        <textarea class="form-control" id="conteudo" name="conteudo" rows="4"><?= old('conteudo') ?></textarea>
    </div>
    <div class="form-group">
        <label for="data">Data</label>
        <input type="date" class="form-control" id="data" name="data" value="<?= old('data') ?>">
    </div>
    <div class="form-group">
        <input type="file" class="form-control-file d-none" id="imagem" name="imagem" accept="image/*" onchange="updateFileName(this)">
        <button type="button" class="btn btn-secondary" onclick="document.getElementById('imagem').click()">Selecionar Imagem</button>
        <span id="file-name" class="ml-2 text-muted">Nenhum arquivo selecionado</span>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

</div>

<script>
    function updateFileName(input) {
        const fileName = input.files[0] ? input.files[0].name : 'Nenhum arquivo selecionado';
        document.getElementById('file-name').textContent = fileName;
    }
</script>

<?= $this->endSection() ?>
