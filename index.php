
<?php 
require_once("Controller/UsuarioController.php");
require_once("Model/Usuario.php");

if (filter_input(INPUT_POST,"TxtNameEmail",FILTER_SANITIZE_STRING)) {

    echo (filter_input(INPUT_POST,"TxtNameEmail",FILTER_SANITIZE_STRING));
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<main>
    <div class="sidenav">
        <div class="login-main-text">
            <h2>Aplicação<br>Página de login</h2>
            <p>Login ou faça seu registro para ter acesso</p>
        </div>
    </div>
    <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form" id="loginForm">
                <form action="" method="post">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control mb-3" name="TxtNameLogin" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control mb-3" name="TxtNameSenha" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-primary" name="BtnEntrar">Login</button>
                    <button type="button" class="btn btn-primary" id="showRegisterForm">Registrar</button>
                </form>
            </div>

            <div class="login-form" id="registerForm" style="display: none;">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control mb-3" name="TxtNameRegister" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control mb-3" name="TxtEmailRegister" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" class="form-control mb-3" name="TxtSenhaRegister" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-primary" name="BtnRegistrar">Registrar</button>
                    <button type="button" class="btn btn-secondary" id="showLoginForm">Voltar</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
document.getElementById('showRegisterForm').addEventListener('click', function() {
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'block';
});

document.getElementById('showLoginForm').addEventListener('click', function() {
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('registerForm').style.display = 'none';
});
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
