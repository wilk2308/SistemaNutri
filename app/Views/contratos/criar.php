<?= $this->extend('master'); ?>

<?= $this->section('content') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Criar Contrato</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Novo Contrato</h1>

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

    <form action="/contratos/criar" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="numero_contrato" class="form-label">Número do Contrato</label>
            <input type="text" id="numero_contrato" name="numero_contrato" class="form-control" placeholder="Exemplo: 001/2024" value="<?= old('numero_contrato') ?>">
        </div>

        <div class="mb-3">
            <label for="nome_cliente" class="form-label">Nome do Cliente</label>
            <input type="text" id="nome_cliente" name="nome_cliente" class="form-control" value="<?= old('nome_cliente') ?>">
        </div>

        <div class="mb-3">
            <label for="data_fechamento" class="form-label">Data de Fechamento</label>
            <input type="date" id="data_fechamento" name="data_fechamento" class="form-control" value="<?= old('data_fechamento') ?>">
        </div>

        <div class="mb-3">
            <label for="area" class="form-label">Área</label>
            <select id="area" name="area" class="form-control">
                <option value="">Selecione a área</option>
                <option value="Direito Previdenciário" <?= old('area') == 'Direito Previdenciário' ? 'selected' : '' ?>>Direito Previdenciário</option>
                <option value="Direito Civil" <?= old('area') == 'Direito Civil' ? 'selected' : '' ?>>Direito Civil</option>
                <option value="Direito Empresarial" <?= old('area') == 'Direito Empresarial' ? 'selected' : '' ?>>Direito Empresarial</option>
                <option value="Direito Trabalhista" <?= old('area') == 'Direito Trabalhista' ? 'selected' : '' ?>>Direito Trabalhista</option>
                <option value="Relações Governamentais" <?= old('area') == 'Relações Governamentais' ? 'selected' : '' ?>>Relações Governamentais</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="materia" class="form-label">Matéria</label>
            <select id="materia" name="materia" class="form-control">
                <option value="">Selecione a matéria</option>
            </select>
        </div>

        <script>
            const materiasPorArea = {
                "Direito Previdenciário": [
                    "Habilitação de herdeiros", "Aposentadoria", "Aposentadoria Especial",
                    "Aposentadoria PcD", "Aposentadoria por Invalidez", "Auxílio-acidente",
                    "Auxílio-doença previdenciário", "Auxílio-doença acidentário", "BPC/LOAS",
                    "Revisão de Aposentadoria", "Parecer Previdenciário", "Planejamento Previdenciário",
                    "Sindicatos", "Pensão por Morte", "Adicional de 25%"
                ],
                "Direito Civil": [
                    "Contratos e Obrigações", "Sucessão|Família", "Consumidor", "Reais",
                    "Assessoria", "Consultoria", "Tribunal superior"
                ],
                "Direito Empresarial": [
                    "Constituição de empresa", "Desconstituição societária", "Fusão|M&A",
                    "Compliance", "Consultoria", "Assessoria"
                ],
                "Direito Trabalhista": [
                    "Verbas trabalhistas", "Desconfiguração da justa causa", "Acumulo de função",
                    "Desvio de função", "Acidente de trabalho", "Verbas rescisórias"
                ],
                "Relações Governamentais": ["Assessoria|Consultoria"]
            };

            document.getElementById('area').addEventListener('change', function() {
                const areaSelecionada = this.value;
                const materiaSelect = document.getElementById('materia');
                materiaSelect.innerHTML = '<option value="">Selecione a matéria</option>';
                if (materiasPorArea[areaSelecionada]) {
                    materiasPorArea[areaSelecionada].forEach(function(materia) {
                        const option = document.createElement('option');
                        option.value = materia;
                        option.textContent = materia;
                        materiaSelect.appendChild(option);
                    });
                }
            });
        </script>

        <button type="submit" class="btn btn-success">Salvar Contrato</button>
    </form>
</div>
</body>
</html>

<?= $this->endSection() ?>
