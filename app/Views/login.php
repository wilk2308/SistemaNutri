<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Plataforma Nutricional - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
      body {
    background: #f6f8ef; /* Fundo claro da paleta */
    font-family: 'Nunito', sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
}

.card {
    background: #ffffff; /* Fundo branco para contraste */
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.card-body {
    background-color: #f6f8ef; /* Combina com o fundo geral */
    border-radius: 15px;
}

.text-center h5 {
    color: #50772a; /* Verde escuro da logo */
}

.btn-primary {
    background-color: #73b32a; /* Verde principal da logo */
    border-color: #73b32a;
}

.btn-primary:hover {
    background-color: #50772a; /* Verde mais escuro */
    border-color: #50772a;
}

.form-control {
    border-radius: 8px;
    border-color: #73b32a; /* Verde principal */
}

.form-control:focus {
    border-color: #50772a; /* Verde escuro */
    box-shadow: 0 0 5px rgba(115, 179, 42, 0.5);
}

.text-muted {
    font-size: 1rem;
    color: #6c757d;
}

.text-muted:hover {
    color: #50772a; /* Verde mais escuro ao passar o mouse */
}


    </style>

</head>

<body>

    <div class="container">
        <!-- Formulário de Login -->
        <form action="/login/store" method="post"> <!-- Certifique-se de que a rota de login está correta -->

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <img src="/assets/img/logo.png" width="420" height="420"/>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                    <!-- Exibir mensagem de erro se houver -->
                                    <?php if(session()->has('error')): ?>
                                        <span><?php echo session()->get('error'); ?></span>
                                    <?php endif; ?>

                                    <div class="text-center">
    <h5>Plataforma Nutricional</h5>
    <p class="text-muted">Pronto para dar o próximo passo em direção ao seu bem-estar?</p>
</div>

<div class="form-group">
    <input type="text" class="form-control form-control-user"
        id="email" name="email" required placeholder="Digite seu usuário..." value="william.sousa@bocayuvaadvogados.com.br">
</div>

<div class="form-group">
    <input type="password" class="form-control form-control-user"
        id="password" placeholder="Senha" name="password" required value="senha_padrao123">
</div>

<div class="form-group">
    <div class="custom-control custom-checkbox small">
        <input type="checkbox" class="custom-control-input" id="customCheck">
        <label class="custom-control-label" for="customCheck">Lembrar-me</label>
    </div>
</div>

<input type="submit" value="Login" class="btn btn-primary btn-user btn-block">


                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        </form> <!-- Fechando o formulário corretamente -->

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>

</body>

</html>
