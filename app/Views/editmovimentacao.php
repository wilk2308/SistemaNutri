
<?php echo $this->extend('master'); ?>

<?= $this->section('content') ?>
                <!-- Begin Page Content -->

                
                <body class="bg-light">
    <div class="container mt-5 col-md-6">
        <form action="<?= base_url(); ?>/movimentacaoController/updatedStore" method="post">
            <input type="hidden" name="id" id="id" class="form-control" value="<?= $movimentacao['id'] ?>">
            
            <div class="row">
            <div class="form-group col-md-2">
                <label for="dtcompetencia" class="fw-bold">Data de Competência</label>
                <input type="date" name="dtcompetencia" id="dtcompetencia" class="form-control"  placeholder="Digite uma data de competência" value="<?= isset($movimentacao['dtcompetencia']) ? $movimentacao['dtcompetencia'] : '' ?>">

            </div>

            

            <div class="form-group col-md-6 mt-4">
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
            <option value=""> </option>
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
                <input type="text" name="valor" id="valor" class="form-control" placeholder="Digite um valor" value="<?= isset($movimentacao['valor']) ? $movimentacao['valor'] : '' ?>">
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
            <div class="form-group col-md-6 mt-4">
                <label for="empresa" class="fw-bold">Empresa</label>
                <select name="empresa" id="empresa"  class="form-control" input type="text" value="<?= isset($movimentacao['empresa']) ? $movimentacao['empresa'] : '' ?>" >
        <option value=""></option>
        <option value="Bocayuva Advogados">Bocayuva Advogados</option>
      
        </select>
                
            </div>
         
            <div class="form-group col-md-6 mt-4">
                <label for="unidade" class="fw-bold">Unidade</label>
                
                <select name="unidade" id="unidade"  class="form-control" input type="text" value="<?= isset($movimentacao['unidade']) ? $movimentacao['unidade'] : '' ?>" >
        <option value=""></option>
        <option value="Filial 1">Filial 1</option>
      
        </select>
             </div>
             

            
        </div> 
</div>

            <input type="submit" value="Salvar" class="btn btn-success mt-9">
           

            <?= anchor(base_url('movimentacaoController/index'), 'Fechar', ['class' => 'btn btn-secondary'])?>

   

        </form>

</div>
 </div>
</div>
</script>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
    <script src="/assets/js/form.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>








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