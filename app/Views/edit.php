
<?php if (auth()->loggedIn()) : ?>
<?php echo $this->extend('master'); ?>

<?= $this->section('content') ?>
                <!-- Begin Page Content -->

                
                <body class="bg-light">
    <div class="container mt-5 col-md-6">
        <form action="<?= base_url(); ?>/ClienteController/updatedStore" method="post">
            <input type="hidden" name="id" id="id" class="form-control" value="<?= $cliente['id'] ?>">
            <div class="form-group mt-4">
                <label for="nome" class="fw-bold">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite um nome" value="<?= $cliente['nome'] ?>">
            </div>
            <div class="form-group mt-4">
                <label for="email" class="fw-bold">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="exemplo@email.com" value="<?= $cliente['email'] ?>">
            </div>
            <div class="form-group mt-4">
                <label for="telefone" class="fw-bold">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" placeholder="11 95555-5555" value="<?= $cliente['telefone'] ?>">
            </div>
            <div class="form-group mt-4">
                <label for="cpf" class="fw-bold">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" placeholder="123.123.123-12" value="<?= $cliente['cpf'] ?>">
            </div>
            <input type="submit" value="Salvar" class="btn btn-success mt-3">
            <?= anchor(base_url('clienteController/index'), 'Fechar', ['class' => 'btn btn-secondary mt-3'])?>
        </form>
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
<?php endif; ?>