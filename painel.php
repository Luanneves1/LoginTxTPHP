<?php
session_start();

if (!isset($_SESSION["nomeusuario"])) {
    header("Location: index.php?msg=1");
    exit();
}

$nomeUsuario = $_SESSION["nomeusuario"];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Controle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            padding-top: 20px;
            background-color: #f0f0f0;
        }
        .navbar-custom {
            background-color: #007bff; /* Color principal da barra de navegação */
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text {
            color: #ffffff; /* Cor do texto da barra de navegação */
        }
        .navbar-custom .navbar-nav .nav-link {
            color: #ffffff; /* Cor dos links da barra de navegação */
        }
        .navbar-custom .nav-item.active .nav-link,
        .navbar-custom .nav-item:hover .nav-link {
            color: #ffffff; /* Cor dos links ativos e ao passar o mouse */
        }
        .jumbotron {
            background-color: #ffffff; /* Cor do fundo do jumbotron */
            padding: 2rem 1rem; /* Espaçamento interno do jumbotron */
            margin-bottom: 2rem; /* Margem inferior do jumbotron */
            border-radius: 0.3rem; /* Borda arredondada do jumbotron */
            box-shadow: 0px 0px 15px 0px rgba(0,0,0,0.1); /* Sombra do jumbotron */
        }
        .btn-logout {
            background-color: #dc3545; /* Cor do botão de logout */
            border-color: #dc3545; /* Cor da borda do botão de logout */
        }
        .btn-logout:hover {
            background-color: #c82333; /* Cor do botão de logout ao passar o mouse */
            border-color: #bd2130; /* Cor da borda do botão de logout ao passar o mouse */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">Painel de Controle</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Configurações</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Bem-vindo, <strong><?php echo $nomeUsuario; ?></strong>!
                </span>
                <form class="d-flex ms-2" action="logout.php" method="post">
                    <button class="btn btn-outline-light btn-logout" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Bem-vindo ao Painel de Controle!</h1>
            <p class="lead">Este é um exemplo de página de painel de controle. Você pode personalizar conforme suas necessidades.</p>
            <hr class="my-4">
            <p>Aqui você pode gerenciar suas configurações e acessar funcionalidades específicas do sistema.</p>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- Conteúdo do painel esquerdo -->
            </div>
            <div class="col-md-6">
                <!-- Conteúdo do painel direito -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
