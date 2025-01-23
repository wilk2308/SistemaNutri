<?php if (auth()->loggedIn()) : ?>
<?php echo $this->extend('master'); ?>

<?= $this->section('content') ?>

                <!-- Begin Page Content -->

                
                <body class="bg-light">
    <div class="container mt-5 col-md-6">
        <form action="<?= base_url(); ?>/CobrancaController/updatedStore" method="post">
            <input type="hidden" name="id" id="id" class="form-control" value="<?= $cobranca['id'] ?>">
            
            <div class="form-group mt-4">
            <label for="valor" class="fw-bold">Nome</label>
            <input type="name" name="nome" id="nome" class="form-control" placeholder="Digite um nome" value="<?= isset($cobranca['Nome']) ? $cobranca['Nome'] : '' ?>">

            </div>
            <div class="form-group mt-4">
            <label for="valor" class="fw-bold">Valor da Cobrança</label>
    <input type="decimal" id="valor" class="form-control"  name="valor"  step="0.01" value="<?= isset($cobranca['Valor']) ? $cobranca['Valor'] : '' ?>"> 
            </div>  
            <div class="form-group mt-4">
                <label for="descricao" class="fw-bold">Descrição</label>
                <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Digite a descrição" value="<?= isset($cobranca['Descricao']) ? $cobranca['Descricao'] : '' ?>">
            </div>
            <div class="form-group mt-4">
                <label for="FormaPagamento" class="fw-bold">Forma de Pagamento</label>
                <select name="FormaPagamento" id="FormaPagamento" input type="text" class="form-control" value="<?= isset($cobranca['FormaPagamento']) ? $cobranca['FormaPagamento'] : '' ?>" >
        <option value="Pix">Pix</option>
        <option value="Boleto">Boleto</option>
        <option value="Dinheiro">Dinheiro</option>
</select>

               
            </div>
            <div class="form-group mt-4">
                <label for="DataVencimento" class="fw-bold">Data de vencimento</label>
                <input type="date" name="DataVencimento" id="DataVencimento" class="form-control" placeholder="Digite a data de vencimento" value="<?= isset($cobranca['DataVencimento']) ? $cobranca['DataVencimento'] : '' ?>">
            
                <input type="submit" value="Salvar" class="btn btn-success mt-4">
                <?= anchor(base_url('cobrancaController/index'), 'Fechar', ['class' => 'btn btn-secondary mt-4'])?>
        </form>
<!-- Script para covnerter moeda -->
       

    </div>
    <?= $this->endSection() ?>
</body>
<?php endif; ?>




