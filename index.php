<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - careca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            background-size: cover;
            background-position: center;
            color: #ffffff;
           background-image: linear-gradient(170deg,black,white);
           
        }

        .container {
            width: 100%;
            margin: 0 auto;
            overflow: hidden;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li:first-child {
            margin-left: 0;
        }

        nav ul li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #fff;
        }

        .card {
            margin: 30px auto;
            background-color: rgb(153, 140, 140);
            color: #ffffff;
            max-width: 400px;
            border-radius: 10px; 
            overflow: hidden; 
        }
        
        .card-header {
            background-color: #2c333b;
            color: #ffffff;
        }

        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center; 
            align-items: center;
        }

        .card-title {
            margin-top: 1rem;
        }

        .button-container {
            margin-top: 20px;
        }

        .cards {
            justify-content: center;
            display: flex;
        }

        .rodape {
            position: static;
            bottom: 0;
            padding: 10px;
            width: 100%;
            background-color: #7c4e4e;
            text-align: center;
        }
    </style>
</head>
<body>

<nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-1">
                <br><br><br><br>
                <img src="imagens/logo.png" height="80">
            </div>
            <div class="col-8 align-items-start pt-1" style="padding-top: 20px!important; font-size:30px">
            <br><br>  Barbearia do careca
            </div>
        </div>
    </div>
</nav>
<br><br>
<div class="container">
    <div class="row cards">
        <div class="col">
            <div class="card text-center h-100">
                <div class="card-header">
                    Crie uma conta
                </div>
                <div class="card-body">
                    <h5 class="card-title">Registre-se</h5>
                    <img src="imagens/registro.png" class="card-img-top" style="max-height: 300px; object-fit: cover;">
                    <div class="button-container">
                        <a href="Cadastrar_Usuarios.php" class="btn btn-primary">Criar sua conta</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center h-100">
                <div class="card-header">
                    Agendar
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nossos barbeiros são de qualidade!</h5>
                    <img src="imagens/agenda.png" class="card-img-top" style="max-height: 300px; object-fit: cover;">
                    <div class="button-container">
                        <a href="Cadastrar_Agenda.php" class="btn btn-primary">Agendar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>