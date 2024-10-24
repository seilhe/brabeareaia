<?php
include "conexao.php";
$sql = "SELECT * FROM abc ORDER BY id_usuario DESC";
$result = $conn->query($sql);
$grupos1 = ["administrador"];
$grupos2 = ["cliente"];
$grupos3 = ["barbeiro"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lista de Usuários</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Arial', sans-serif;
    }
    .navbar {
      margin-bottom: 20px;
    }
    .container {
      margin-top: 20px;
    }
    h2 {
      margin-bottom: 20px;
      color: #343a40;
    }
    .table {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .table th {
      background-color: #007bff;
      color: white;
    }
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: gray;
    }
    .table-hover tbody tr:hover {
      background-color: black;
    }
  </style>
</head>
<body>


<div class="container">
  <h2>Lista de Usuários</h2>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Grupo</th>
      </tr>
    </thead>
    <tbody>
  
      <?php
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row['id_usuario']."</td><td>".$row['nome']."</td><td>".$grupos1[$row['id_grupo']]."</td></tr>";
          echo "<tr><td>".$row['id_usuario']."</td><td>".$row['nome']."</td><td>".$grupos2[$row['id_grupo']]."</td></tr>";
          echo "<tr><td>".$row['id_usuario']."</td><td>".$row['nome']."</td><td>".$grupos3[$row['id_grupo']]."</td></tr>";
        }
      } else {
        echo "<tr><td colspan='3' class='text-center'>Nenhum usuário encontrado.</td></tr>";
      }
      ?>
    </tbody>
    
  </table>
  <a href="index.php" class="btn btn-primary">Voltar</a>
</div>

</body>
</html>
