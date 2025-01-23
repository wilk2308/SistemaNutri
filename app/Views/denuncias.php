<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<!-- Canal de Denúncia -->
<div class="container-fluid">
    <!-- Titulo Painel -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Canal de Denúncia</h1>
    </div>

    <!-- Formulário de Denúncia -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Formulário de Denúncia</h6>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('denuncias/submit') ?>" method="post">
                        <div class="form-group">
                            <label for="classificacao">Classificação da Denúncia</label>
                            <select id="classificacao" name="classificacao" class="form-control" required>
                                <option value="" disabled selected>Escolha uma opção</option>
                                <!-- Add your options here -->
                                <option value="opcao1">Opção 1</option>
                                <option value="opcao2">Opção 2</option>
                                <option value="opcao3">Opção 3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="descricao">* Descrição da Denúncia</label>
                            <textarea id="descricao" name="descricao" class="form-control" placeholder="Digite aqui os detalhes da denúncia..." required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="data_submissao">* Data de Submissão</label>
                            <input type="date" id="data_submissao" name="data_submissao" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="gravidade">* Gravidade</label>
                            <input type="text" id="gravidade" name="gravidade" class="form-control" placeholder="Nível de gravidade da denúncia" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>

                        <small class="form-text text-muted">
                        Este é um canal seguro para envio de denúncias. Todas as informações enviadas serão tratadas com sigilo e de acordo com as políticas de privacidade da empresa.
                        </small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
