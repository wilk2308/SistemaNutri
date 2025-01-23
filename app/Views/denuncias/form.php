<?= $this->extend('master') ?>

<?= $this->section('content') ?>

<!-- Canal de Denúncia -->
<div class="container-fluid">
    <!-- Titulo Painel -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Canal de Denúncia</h1>
    </div>

    <!-- Conteúdo em duas colunas -->
    <div class="row">
        <!-- Formulário de Denúncia -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Formulário de Denúncia</h6>
                </div>
                <div class="card-body">
                    <form action="<?= site_url('denuncias/submit') ?>" method="post">
                    <div class="form-group">
    <label for="classificacao">* Classificação da Denúncia</label>
    <select id="classificacao" name="classificacao" class="form-control" required onchange="toggleOutroCampo(this.value)">
        <option value="" disabled selected>Escolha uma opção</option>
        <option value="Corrupção">Corrupção</option>
        <option value="Suborno">Suborno</option>
        <option value="Fraude">Fraude</option>
        <option value="Assédio">Assédio</option>
        <option value="Ética">Ética</option>
        <option value="Outros">Outros</option>
    </select>
</div>

<!-- Campo de texto para "Outros" -->
<div class="form-group" id="campoOutro" style="display: none;">
    <label for="outro_classificacao">Por favor, especifique</label>
    <input type="text" id="outro_classificacao" name="outro_classificacao" class="form-control" placeholder="Descreva a classificação da denúncia">
</div>

<script>
    // Função para mostrar ou esconder o campo de texto "Outros"
    function toggleOutroCampo(value) {
        const campoOutro = document.getElementById('campoOutro');
        if (value === 'Outros') {
            campoOutro.style.display = 'block';
        } else {
            campoOutro.style.display = 'none';
        }
    }
</script>


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
                            <select id="gravidade" name="gravidade" class="form-control" required>
                                <option value="" disabled selected>Escolha o nível de gravidade</option>
                                <option value="muito_leve">Muito leve</option>
                                <option value="leve">Leve</option>
                                <option value="media">Média</option>
                                <option value="alta">Alta</option>
                                <option value="muito_alta">Muito alta</option>
                            </select>
                            
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>

                        <small class="form-text text-muted mt-2">
                                Gravidade da denúncia:<br>
                                <b>Muito leve:</b> Ações ou omissões involuntárias sem intenção de causar danos.<br>
                                <b>Leve:</b> Ações que causaram danos remediáveis, sem recorrência.<br>
                                <b>Média:</b> Ações que causaram danos parcialmente remediáveis, sem impacto grave.<br>
                                <b>Alta:</b> Danos recorrentes e não recuperáveis, com possibilidade de atividade criminosa culposa.<br>
                                <b>Muito alta:</b> Danos à vida ou atividade criminosa dolosa.
                            </small>
                            <br>

                        <small class="form-text text-muted">
                        </small>
                    </form>
                </div>
            </div>
        </div>

        <!-- Mensagem de Introdução -->
        <div class="col-lg-4">
            <div class="alert alert-info" style="background-color: #e3f7ff; color: #064273; border-left: 5px solid #007bff; padding: 15px; border-radius: 5px;">
                <h5 class="font-weight-bold">Bem-vindo(a) ao Canal de Denúncias!</h5>
                <p style="margin-bottom: 8px;">
                    Este canal foi criado para você poder relatar, de forma confidencial e segura, qualquer situação de irregularidade, conduta inadequada, ou comportamento que contrarie as normas internas e princípios éticos da nossa organização.
                </p>
                <p style="margin-bottom: 0;">
                    Sua denúncia será tratada com total discrição e as medidas cabíveis serão tomadas, garantindo o sigilo das informações fornecidas.
                </p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
