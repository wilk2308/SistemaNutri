
<?php if (auth()->loggedIn()) : ?>

<?php echo $this->extend('master'); ?>

<?= $this->section('content') ?>


<!-- pagination cliente -->
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
                <!-- Begin Page Content -->

                
                
    <div class="container mt-2">
        
    </div>
    <div class="container mt-3">
        
      
        <div class="modal-body">
            <div class="container-fluid">
            
        <table class="table table-bordered" id="mydatatable">

        <!-- Cria o botão de cadastro -->
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target=".bd-example-modal-x4">Novo Cliente</button>

       
            <thead>
                <tr class="cabecalho">
                    <th>ID</th>
                    <th>NOME</th>
                    <th>E-MAIL</th>
                    <th>TELEFONE</th>
                    <th>CPF</th>
                    <th>DATA DE CADASTRO</th>
                    <?php if($tipo == 'admin'): ?>
                    <th>AÇÕES</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
            <!-- Lista os clientes cadastrados -->
            <?php foreach($clientes as $cliente): ?> 
                <tr class="linha">
                    <td><?= $cliente['id']         ?></td>
                    <td><?= $cliente['nome']       ?></td>
                    <td><?= $cliente['email']      ?></td>
                    <td><?= $cliente['telefone']   ?></td>
                    <td><?= $cliente['cpf']        ?></td>
                    <!-- Formata a data cadastrada -->
                    <td><?= date('d/m/Y H:i', strtotime($cliente['updated_at'])) ?></td> 
                    <!-- Cria os botões editar e apagar -->
           
                    <td>
                   
                        
                        <?= anchor(base_url('clienteController/edit/'.$cliente['id']), 'Editar',  ['class' => 'btn btn-primary mb-3'])?>
                        <?= anchor(base_url('clienteController/delete/'.$cliente['id']), 'Remover', ['class' => 'btn btn-danger mb-3'])?>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
            </tbody>

            
        </table>   
        <?php echo $pager->links(); ?>
















        <!-- Begin Page Content -->

                <!-- Modal -->
<!-- Modal extra grande -->

<div class="modal fade bd-example-modal-x4" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

    <div class="modal-body">
            <div class="container-fluid">

    <h5 class="modal-title" id="TituloModalCentralizado">Cliente</h5>
 <p>

        <form action="<?= base_url(); ?>/ClienteController/store" method="post">
            <input type="hidden" name="id" id="id" class="form-control" value="<?= isset($cliente['id']) ? $cliente['id'] : '' ?>">
            
            <div class="row">
             <div class="form-group col-md-5">
                <label for="nome" class="fw-bold">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite um nome" value="<?= isset($cliente['nome']) ? $cliente['nome'] : '' ?>">
            
            </div>
            <div class="form-group col-md-5">
                <label for="email" class="fw-bold">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="exemplo@email.com" value="<?= isset($cliente['email']) ? $cliente['email'] : '' ?>">
            </div>
            
            <div class="form-group col-md-5">
                <label for="telefone" class="fw-bold">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" placeholder="11 95555-5555" value="<?= isset($cliente['telefone']) ? $cliente['telefone'] : '' ?>">
            </div>
            <div class="form-group col-md-5">
                <label for="cpf" class="fw-bold">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" placeholder="123.123.123-12" value="<?= isset($cliente['cpf']) ? $cliente['cpf'] : '' ?>">

                
            </div>

            <div class="modal-footer">
       
       
      </div>
     
            
            
        </form>
    </div>
    <button type="button" class="btn btn-primary">Salvar mudanças</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
</div>
</div>
</div>

            </div>
            </div>
            </div>
            

  









    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>
   


</body>

</html>

<?= $this->endSection() ?>



<?php endif; ?>