<?php if (auth()->loggedIn()) : ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<?php echo $this->extend('master'); ?>

<?= $this->section('content') ?>


<!-- Inicio Listar Editar e Remover Movimentação -->
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
        
        <!-- Cria o botão de cadastro -->
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target=".bd-example-modal-xl">Novo Lançamento</button>
          

        
            
        <table class="table table-bordered" id="mydatatable">

        
            <thead>
                <tr class="cabecalho">
                    <th>ID</th>
                    <th>Data da Competência</th>
                    
                    <th>Sub-Categoria</th>
                    <th>Descrição/Histórico</th>
                    <th>Forma de Pagamento</th>
                    <th>Conta Bancária</th>
                    <th>Centro de Custo</th>
                    <th>Nome Participante</th>
                    <th>Valor</th>
                    <th>Data Vencimento</th>
                    <th>Data Pagamento</th>
                    
                    <th>AÇÕES</th>
                    
                </tr>
            </thead>
            <tbody>
            <!-- Lista as cobrança cadastradas -->
            

            <?php foreach ($movimentacoes as $movimentacao): ?>
    <tr class="linha">
        <td> <?= isset($movimentacao['id']) ? $movimentacao['id'] : '' ?></td>
        <td><?= isset($movimentacao['dtcompetencia']) ? date('d/m/Y', strtotime($movimentacao['dtcompetencia'])) : '' ?></td>
        <td><?= isset($movimentacao['subcategoria_id']) ? $movimentacao['subcategoria_id'] : '' ?></td>
        <td><?= isset($movimentacao['descricao']) ? $movimentacao['descricao'] : '' ?></td>
        <td><?= isset($movimentacao['formapagamento']) ? $movimentacao['formapagamento'] : '' ?></td>
        <td><?= isset($movimentacao['contabancaria']) ? $movimentacao['contabancaria'] : '' ?></td>
        <td><?= isset($movimentacao['centrocusto']) ? $movimentacao['centrocusto'] : '' ?></td>
        <td><?= isset($movimentacao['nomefavorecido']) ? $movimentacao['nomefavorecido'] : '' ?></td>
        <td>R$ <?= isset($movimentacao['valor']) ? $movimentacao['valor'] : '' ?></td>
        <td><?= isset($movimentacao['datavencimento']) ? date('d/m/Y', strtotime($movimentacao['datavencimento'])) : '' ?></td>
        <td><?= isset($movimentacao['dtpagamento']) ? date('d/m/Y', strtotime($movimentacao['dtpagamento'])) : '' ?></td>
        
       

        
                    
                    <!-- Cria os botões editar e apagar -->
           
                    <td>
                       
            
                  
                      
                    <?= anchor(base_url('movimentacaoController/edit/'.$movimentacao['id']), 'Editar',  ['class' => 'btn btn-primary mb-3' ])?>
                    <?= anchor(base_url('movimentacaoController/delete/'.$movimentacao['id']), 'Remover', ['class' => 'btn btn-danger mb-3'])?>
                      



                       
                    </td>
                     

            </div>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>   

        <?php echo $pager->links(); ?>




<!-- Modal -->
<!-- Cadastro de Movimentação-->

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

   
   


    <form action="<?= base_url(); ?>/MovimentacaoController/store" method="post">
            <input type="hidden" name="id" id="id" class="form-control" value="<?= isset($movimentacao['id']) ? $movimentacao['id'] : '' ?>">
           
            
            
            
            <div class="modal-body">
            <div class="container-fluid">

            <h5 class="modal-title" id="TituloModalCentralizado">Movimentação</h5>
            <p>
            
            <div class="row">
            <div class="form-group col-md-2">
                <label for="dtcompetencia" class="fw-bold">Data de Competência</label>
                <input type="date" name="dtcompetencia" id="dtcompetencia" class="form-control"  placeholder="Digite uma data de competência" value="<?= isset($movimentacao['dtcompetencia']) ? $movimentacao['dtcompetencia'] : '' ?>">

            </div>

            

            <div class="form-group col-md-6">
                <label for="subcategoria_id" class="fw-bold">Sub-Categoria</label>
                <select name="subcategoria_id" id="subcategoria_id"  class="form-control" input type="text" value="<?= isset($movimentacao['subcategoria_id']) ? $movimentacao['subcategoria_id'] : '' ?>" >
        <option value="1">Saldo Inicial</option>
        <option value="2">Transferências Entradas</option>
        <option value="3">Receitas com Honorários</option>
        <option value="4">Receitas Financeiras</option>
        <option value="5">Outras Receitas</option>
        <option value="6">Entradas não Operacionas</option>
        <option value="7">Receitas não operacionais</option>
        <option value="8">Transferências saidas</option>
        <option value="9">Salários</option>
        <option value="10">Encargos</option>
        <option value="11">Benefícios</option>
        <option value="12">Repasses a parceiros e Participações</option>
        <option value="13">Serviços Terceirizados</option>
        <option value="14">Despesas gerais</option>
        <option value="15">Despesas variáveis</option>
        <option value="16">Custos com Marketing</option>
        <option value="17">Tributos e Contribuições</option>
        <option value="18">Tributos sobre a venda</option>
        <option value="19">Tributos sobre o lucro</option>
        <option value="20">Outras Receitas e Despesas não Operacionais</option>
        <option value="21">Despesas financeiras</option>
        <option value="22">Depreciação e amortização</option>
        <option value="23">PLR Associados</option>
        <option value="24">Retirada de lucros</option>
        <option value="25">Estornos</option>
        <option value="26">Imobilizado</option>
        <option value="27">Outras despesas</option>
        </select>
        
            </div>
            
            <div class="form-group col-md-6">
                <label for="descricao" class="fw-bold">Descrição/Histórico</label>
                <input type="text" name="descricao" id="descricao" class="form-control" placeholder="Digite uma descrição" value="<?= isset($movimentacao['descricao']) ? $movimentacao['descricao'] : '' ?>">
            </div>
</div>
                
<div class="row">
            <div class="form-group col-md-6">
                <label for="formapagamento" class="fw-bold">Forma Pagamento</label>
                <select name="formapagamento" id="formapagamento"  class="form-control" input type="text" value="<?= isset($movimentacao['formapagamento']) ? $movimentacao['formapagamento'] : '' ?>" >
        <option value=""></option>
        <option value="Pix">Pix</option>
        <option value="Boleto">Boleto</option>
        <option value="Dinheiro">Dinheiro</option>
        </select>
        
</div>

      <div class="form-group col-md-6">
                <label for="contabancaria" class="fw-bold">Conta Bancária</label>
                <select type="text" name="contabancaria" id="contabancaria" class="form-control" placeholder="Digite uma conta bancária" value="<?= isset($movimentacao['contabancaria']) ? $movimentacao['contabancaria'] : '' ?>">
                <option value=""> </option>
            <option value="BB">BB</option>
            <option value="CEF 2301">CEF 2301</option>
            <option value="CEF PRONAMPE">CEF PRONAMPE</option>
            <option value="PAGSEGURO">PAGSEGURO</option>
            <option value="RECEBA FÁCIL">RECEBA FÁCIL</option>
        </select>
            </div>

            <div class="form-group col-md-6">
                <label for="valor" class="fw-bold">Valor</label>
                <input type="decimal" name="valor" id="valor" class="form-control" placeholder="Digite um valor"  step="0.01" value="<?= isset($movimentacao['valor']) ? $movimentacao['valor'] : '' ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="tipofavorecido" class="fw-bold">Tipo de Favorecido</label>
                <select name="tipofavorecido" id="tipofavorecido" class="form-control" input type="text" placeholder="Selecione o tipo de favorecido" value="<?= isset($movimentacao['tipofavorecido']) ? $movimentacao['tipofavorecido'] : '' ?>">
            <option value=""></option>
            <option value="Fornecedor">Fornecedor</option>
            <option value="Parceiro">Parceiro</option>
            <option value="Colaborador">Colaborador</option>
            <option value="PJ">PJ</option>
            <option value="Terceirizado">Terceirizado</option>
            <option value="Sócio">Sócio</option>
        </select>
            </div>

            <div class="form-group col-md-6">
                <label for="nomefavorecido" class="fw-bold">Nome Favorecido</label>
                <input type="text" name="nomefavorecido" id="nomefavorecido" class="form-control" placeholder="Digite o nome do favorecido" value="<?= isset($movimentacao['nomefavorecido']) ? $movimentacao['nomefavorecido'] : '' ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="centrocusto" class="fw-bold">Centro de Custo</label>
                <select name="centrocusto" id="centrocusto"  class="form-control" input type="text" value="<?= isset($movimentacao['centrocusto']) ? $movimentacao['centrocusto'] : '' ?>" >
        <option value=""></option>
        <option value="D. Previdenciário">D. Previdenciário</option>
        <option value="Vendas">Vendas</option>
        <option value="Marketing">Marketing</option>
        <option value="Empresarial">Empresarial</option>
        <option value="Cível">Cível</option>
        <option value="Trabalhista">Trabalhista</option>
        <option value="Custos Escritório">Custos Escritório</option>
        </select>
            </div>
            

            <div class="form-group col-md-2">
                <label for="datavencimento" class="fw-bold">Data de Vencimento</label>
                <input type="date" name="datavencimento" id="datavencimento" class="form-control" placeholder="Digite uma data de vencimento" value="<?= isset($movimentacao['datavencimento']) ? $movimentacao['datavencimento'] : '' ?>">
            </div>

            <div class="form-group col-md-2">
                <label for="dtpagamento" class="fw-bold">Data de Pagamento</label>
                <input type="date" name="dtpagamento" id="dtpagamento" class="form-control" placeholder="Digite uma data de pagamento" value="<?= isset($movimentacao['dtpagamento']) ? $movimentacao['dtpagamento'] : '' ?>">
            </div>
            
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="empresa" class="fw-bold">Empresa</label>
                <select name="empresa" id="empresa"  class="form-control" input type="text" value="<?= isset($movimentacao['empresa']) ? $movimentacao['empresa'] : '' ?>" >
        <option value=""></option>
        <option value="Bocayuva Advogados">Bocayuva Advogados</option>
      
        </select>
                
            </div>
         
            <div class="form-group col-md-6">
                <label for="unidade" class="fw-bold">Unidade</label>
                
                <select name="unidade" id="unidade"  class="form-control" input type="text" value="<?= isset($movimentacao['unidade']) ? $movimentacao['unidade'] : '' ?>" >
        <option value=""></option>
        <option value="Filial 1">Filial 1</option>
      
        </select>
             </div>
             

            
        </div> 
        

       
    </div>
            <input type="submit" value="Salvar" class="btn btn-success mt-9">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
    </div>
 
    
</div>

</div>

</div>
</div>
</form>

<script>
        $(document).ready(function() {
    $('#mydatatable').DataTable({
        "paging": true, // Ativar paginação
        "searching": true, // Ativar busca
        "ordering": true, // Ativar ordenação
        "order": [], // Desabilitar ordenação inicial
        "columnDefs": [{ 
            "targets": 'no-sort', // Colunas que não podem ser ordenadas
            "orderable": false 
        }],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
});
</script>


<?= $this->endSection() ?>
<?php endif; ?>
