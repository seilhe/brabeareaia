<?php
include "conexao.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cadastro da Agenda do Barbeiro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            width: 40%;
            margin: 50px auto;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            color: black;
            backdrop-filter: blur(30px);
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            background-image: linear-gradient(170deg, black, gray);
            color: #ffffff;
        }
        h2,label {
            color:white;
        }
    </style>
</head>
<body>

<div class="container mt-3">
    <h2>Cadastro da Agenda do Barbeiro</h2>
    <form action="DadosAgenda.php" method="POST">
        <div class="mb-3 mt-3">
            <label for="barbeiro">Barbeiro</label>
            <select id="barbeiro" name="barbeiro" class="form-select" required>
                <option >Selecione um Barbeiro</option>
                <?php
                $sql = 'select * from abc where id_grupo = 2';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option>".$row['nome']."</option>";
                  }
                }
        ?>
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="cliente">cliente</label>
            <select id="cliente" name="cliente" class="form-select" required>
                <option >Selecione um cliente</option>
                <?php
                $sql = 'select * from abc where id_grupo = 3';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option>".$row['nome']."</option>";
                  }
                }
        ?>
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="dia_da_semana">Dia da semana</label>
            <select id="dia_da_semana" name="dia_da_semana" class="form-select" required>
                <option>Selecione o dia da semana</option>
                <option value="0">Domingo</option>
                <option value="1">Segunda-feira</option>
                <option value="2">Terça-feira</option>
                <option value="3">Quarta-feira</option>
                <option value="4">Quinta-feira</option>
                <option value="5">Sexta-feira</option>
                <option value="6">Sábado-feira</option>
            </select>
        </div>

        <div class="mb-3 mt-3">
            <label for="horario_inicio">Horário início:</label>
            <select class="form-select" id="horario_inicio" name="horario_inicio" required>
            <option>Escolha um horário</option>
        <option value="08:00">08:00</option>
        <option value="08:30">08:30</option>
        <option value="09:00">09:00</option>
        <option value="09:30">09:30</option>
        <option value="10:00">10:00</option>
        <option value="10:30">10:30</option>
        <option value="11:00">11:00</option>
        <option value="11:30">11:30</option>
        <option value="12:00">12:00</option>
            </select>
        </div>

        <div class="mb-3 mt-3">
      <label for="hora_invervalo_inicio">Hora intervalo inicio</label>
      <input type="time" id="hora_invervalo_inicio" name="hora_invervalo_inicio" class="form-control" value="">
    </div>

    <div class="mb-3 mt-3">
      <label for="hora_invervalo_fim">Hora intervalo fim</label>
      <input type="time" id="hora_invervalo_fim" name="hora_invervalo_fim" class="form-control" value="">
    </div>

    <div class="mb-3 mt-3">
      <label for="horario_fim">Horário final</label>
      <input type="time" id="horario_fim" name="horario_fim" class="form-control" value="">
    </div>



        <div class="d-flex justify-content-between mt-3">
            <a href="index.php" class="btn btn-primary">Voltar</a>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>

</body>
</html>

<?php
/*

*/
?>