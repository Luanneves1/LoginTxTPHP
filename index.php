<?php
session_start();
require_once("Controller/UsuarioController.php");
require_once("Model/Usuario.php");

$usuarioController = new UsuarioController();
$msg = "";

// Verifica se há mensagens a serem exibidas
if (filter_input(INPUT_GET, "msg", FILTER_SANITIZE_NUMBER_INT)) {
    if (filter_input(INPUT_GET, "msg", FILTER_SANITIZE_NUMBER_INT) == 1) {
        $msg = "<div class='alert alert-warning'>Faça o login para acessar o painel!</div>";
    } elseif (filter_input(INPUT_GET, "msg", FILTER_SANITIZE_NUMBER_INT) == 2) {
        $msg = "<div class='alert alert-info'>Você fez o logout!</div>";
    }
}

// Verifica se foi submetido o formulário de registro
if (filter_input(INPUT_POST, "TxtEmailRegister", FILTER_SANITIZE_STRING)) {
    $usuario = new Usuario();
    $usuario->setNome(filter_input(INPUT_POST, "TxtNameRegister", FILTER_SANITIZE_STRING));
    $usuario->setEmail(filter_input(INPUT_POST, "TxtEmailRegister", FILTER_SANITIZE_STRING));
    $usuario->setSenha(md5(filter_input(INPUT_POST, "TxtSenhaRegister", FILTER_SANITIZE_STRING)));
    $usuario->setData(date("Y-m-d H:i:s"));

    $result = $usuarioController->Cadastrar($usuario);

    switch ($result) {
        case 1:
            $msg = "<div class='alert alert-success'>Usuário cadastrado com sucesso!</div>";
            break;

        case -1:
            $msg = "<div class='alert alert-warning'>Usuário já está cadastrado!</div>";
            break;

        case -2:
            $msg = "<div class='alert alert-warning'>Dados inválidos!</div>";
            break;

        case -10:
            $msg = "<div class='alert alert-danger'>Erro ao cadastrar usuário. Tente novamente mais tarde.</div>";
            break;
    }
}

// Verifica se foi submetido o formulário de login
if (filter_input(INPUT_POST, "TxtNameLogin", FILTER_SANITIZE_STRING)) {
    $usuario = $usuarioController->Autenticar(
        filter_input(INPUT_POST, "TxtNameLogin", FILTER_SANITIZE_STRING),
        md5(filter_input(INPUT_POST, "TxtNameSenha", FILTER_SANITIZE_STRING))
    );

    if ($usuario != null) {
        $_SESSION["nomeusuario"] = $usuario->getNome();
        $_SESSION["email"] = $usuario->getEmail();
        $_SESSION["data"] = $usuario->getData();

        header("Location: painel.php");
        exit();
    } else {
        $msg = "<div class='alert alert-warning'>Usuário ou senha inválido!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicação - Página de Login e Registro</title>
    <link rel="stylesheet" href="Css/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        function mostrarRegistro() {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registerForm').style.display = 'block';
        }

        function mostrarLogin() {
            document.getElementById('loginForm').style.display = 'block';
            document.getElementById('registerForm').style.display = 'none';
        }

        function validarEmail() {
            var email = document.getElementById("TxtEmailRegister").value;
            if (email.indexOf('@') == -1 || email.indexOf('.') == -1) {
                alert("E-mail inválido");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <main>
        <div class="sidenav">
            <div class="login-main-text">
                <img src="Img/world.png" class="" alt="">
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
                            <input type="text" class="form-control mb-3" name="TxtNameLogin" placeholder="E-mail"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control mb-3" name="TxtNameSenha" placeholder="Senha" required>
                        </div>
                        <?php echo $msg; ?>
                        <button type="submit" class="btn btn-primary" name="BtnEntrar">Login</button>
                        <button type="button" class="btn btn-primary" onclick="mostrarRegistro()">Registrar</button>
                    </form>
                </div>

                <div class="login-form" id="registerForm" style="display: none;">
                    <form action="" method="post" onsubmit="return validarEmail()">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control mb-3" name="TxtNameRegister" placeholder="Nome"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control mb-3" name="TxtEmailRegister" id="TxtEmailRegister"
                                placeholder="E-mail">
                            <?php echo $msg; ?>
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control mb-3" name="TxtSenhaRegister"
                                placeholder="Senha" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="BtnRegistrar">Salvar</button>
                        <button type="button" class="btn btn-secondary" onclick="mostrarLogin()">Voltar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>
