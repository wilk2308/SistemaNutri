
<?php if (auth()->loggedIn()) : ?>
<?php echo $this->extend('master'); ?>

<?= $this->section('content') ?>


<?php
// API do Asaas
$boletoId = 'pay_60gfdw8zzxf7mz9s';


// URL para o boleto no Asaas
$asaasUrl = "https://sandbox.asaas.com/i/60gfdw8zzxf7mz9s";

// URL para o cobrança no Asaas
$url = 'https://sandbox.asaas.com/api/v3/payments';
?>

                <!-- Begin Page Content -->

                <style>
..pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a {
  border: 1px solid #ddd; /* Gray */
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>

                
    <div class="container mt-2">
        
    </div>
    <div class="container mt-3">

        <!-- Cria o botão de cadastro para o Modal -->
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target=".bd-example-modal-x3">Nova Cobrança</button>
        <!-- Cria o botão de cadastro -->
          
            
        <table class="table table-bordered" id="mydatatable">
            <thead>
                <tr class="cabecalho">
                    <th>ID</th>
                    <th>NOME</th>
                    <th>VALOR</th>
                    <th>DESCRIÇÃO</th>
                    <th>FORMA DE PAGAMENTO</th>
                    <th>DATA DE VENCIMENTO</th>
                    
                    <th>AÇÕES</th>
                    
                </tr>
            </thead>
            <tbody>
            <!-- Lista as cobrança cadastradas -->
            

            <?php foreach ($cobrancas as $cobranca): ?>
    <tr class="linha">
        <td> <?= isset($cobranca['id']) ? $cobranca['id'] : '' ?></td>
        <td> <?= isset($cobranca['Nome']) ? $cobranca['Nome'] : '' ?></td>
        <td>R$ <?= isset($cobranca['Valor']) ? $cobranca['Valor'] : '' ?></td>
        <td><?= isset($cobranca['Descricao']) ? $cobranca['Descricao'] : '' ?></td>
        <td><?= isset($cobranca['FormaPagamento']) ? $cobranca['FormaPagamento'] : '' ?></td>
        <td><?= isset($cobranca['DataVencimento']) ? date('d/m/Y', strtotime($cobranca['DataVencimento'])) : '' ?></td>

        <!-- Formata a data cadastrada -->
                    
                    <!-- Cria os botões editar e apagar -->
           
                    <td>
                        <!-- Botão para abrir o boleto -->
                    <a href="<?php echo $asaasUrl; ?>" class="btn btn-outline-info mb-3" target="_blank">Abrir Boleto</a>
                      
                    <?= anchor(base_url('cobrancaController/edit/'.$cobranca['id']), 'Editar',  ['class' => 'btn btn-primary mb-3'])?>
                    <?= anchor(base_url('cobrancaController/delete/'.$cobranca['id']), 'Remover', ['class' => 'btn btn-danger mb-3'])?>
                      


                       
                    </td>
                     

            </div>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>   

        <?php echo $pager->links(); ?>


        <!-- Modal Cadastrar cobranças -->
        <!-- Modal extra grande -->
<div class="modal fade bd-example-modal-x3" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-x1">
    <div class="modal-content">

        <form action="<?= base_url(); ?>/CobrancaController/store" method="post">
            <input type="hidden" name="id" id="id" class="form-control" value="<?= isset($cobranca['id']) ? $cobranca['id'] : '' ?>">


            <div class="modal-body">
            <div class="container-fluid">
            <h5 class="modal-title" id="TituloModalCentralizado">Cobrança</h5>
            
            <p>
            
            <div class="row">
             <div class="form-group col-md-10">
                <label for="nome" class="fw-bold">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control"  placeholder="Digite um nome" value="<?= isset($cobranca['Nome']) ? $cobranca['Nome'] : '' ?>">

            </div>
            
                        
            <div class="form-group col-md-5">
                <label for="FormaPagamento" class="fw-bold">Forma de Pagamento</label>
                <select name="FormaPagamento" id="FormaPagamento"  class="form-control" input type="text" value="<?= isset($cobranca['FormaPagamento']) ? $cobranca['FormaPagamento'] : '' ?>" >
        <option value="Pix">Pix</option>
        <option value="Boleto">Boleto</option>
        <option value="Dinheiro">Dinheiro</option>
        </select>
        </div>

            <div class="form-group col-md-5">
            <label for="valor" class="fw-bold">Valor da Cobrança</label>
            <input type="decimal" id="valor" class="form-control"1.0  placeholder="Digite o valor" name="valor"  step="0.01" value="<?= isset($cobranca['Valor']) ? $cobranca['Valor'] : '' ?>"> 
            </div>
            
            
            <div class="form-group col-md-10">
                <label for="descricao" class="fw-bold">Descrição</label>
                <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Digite uma descrição" value="<?= isset($cobranca['Descricao']) ? $cobranca['Descricao'] : '' ?>">
            </div>
          


                
           
            <div class="form-group col-md-5">
                <label for="DataVencimento" class="fw-bold">Data de vencimento</label>
                <input type="date" name="DataVencimento" id="DataVencimento" class="form-control" placeholder="Digite uma data de vencimento" value="<?= isset($cobranca['DataVencimento']) ? $cobranca['DataVencimento'] : '' ?>">
            </div>
           
            </div>
            <input type="submit" value="Salvar" class="btn btn-success mt-9">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </form>

     
</div>
</div>
</div>
</div>

       

            

<?= $this->endSection() ?>
<?php endif; ?>