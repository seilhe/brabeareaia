<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir o arquivo de conexão
include "conexao.php";

// Consultar todos os registros
$sql = "SELECT * FROM agenda ORDER BY id_usuario DESC"; 
$result = $conn->query($sql);

// Processar a exclusão, se o ID for passado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);
    
    // Sanitização
    $delete_sql = $conn->prepare("DELETE FROM agenda WHERE id_agenda = ?");
    $delete_sql->bind_param("i", $delete_id);
    $delete_sql->execute();

    // Redirecionar para evitar reenvio do formulário
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Agendas</title>
    <style>
        body {
            background-color: #121212; /* Fundo preto */
            color: #ffffff; /* Texto branco */
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #ffffff;
            margin: 20px 0;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
            border-radius: 10px; /* Cantos arredondados na tabela */
            overflow: hidden; /* Para ocultar as bordas arredondadas */
        }

        th, td {
            border: 1px solid #444; /* Borda cinza */
            padding: 15px; /* Mais espaço interno */
            text-align: left;
            border-radius: 8px; /* Cantos arredondados nas células */
        }

        th {
            background-color: #1e1e1e; /* Cinza escuro */
        }

        tr:nth-child(even) {
            background-color: #2a2a2a; /* Cinza claro */
        }

        tr:hover {
            background-color: #333; /* Destaque ao passar o mouse */
        }

        .btn-voltar {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #444; /* Botão cinza */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-voltar:hover {
            background-color: #555; /* Destaque ao passar o mouse */
        }

        .btn-excluir {
            background-color: #d9534f; /* Vermelho */
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-excluir:hover {
            background-color: #c9302c; /* Vermelho escuro */
        }
    </style>
</head>
<body>

<h1>Registros da Barbearia</h1>

<table class="tabela-registros-barbearia">
    <thead>
        <tr>
            <th>Agenda id</th>
            <th>Dia da semana</th>
            <th>Horário início</th>
            <th>Usuários id</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Armazenar os dados em arrays
        $dados_agenda = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dados_agenda[] = $row;
            }
        }
        

        if (empty($dados_agenda)) {
            echo "<tr><td colspan='3'>Nenhum registro encontrado.</td></tr>";
        } else {
            foreach ($dados_agenda as $agenda) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($agenda['id_agenda']) . "</td>";
                echo "<td>" . htmlspecialchars($agenda['dia_da_semana']) . "</td>";
                echo "<td>" . htmlspecialchars($agenda['horario_inicio']) . "</td>";
                echo "<td>" . htmlspecialchars($agenda['id_usuario']) . "</td>";
                echo "<td>";
                // Verifique se a chave 'id_agenda' existe
                if (isset($agenda['id_agenda'])) {
                    echo '<form method="POST" style="display:inline;" onsubmit="return confirm(\'Tem certeza que deseja excluir este registro?\');">';
                    echo '<input type="hidden" name="delete_id" value="' . htmlspecialchars($agenda['id_agenda']) . '">';
                    echo '<button type="submit" class="btn-excluir">Excluir</button>';
                    echo '</form>';
                } else {
                    echo "ID não encontrado.";
                }
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

<a href="index.php" class="btn-voltar">Voltar</a>

</body>
</html>

<?php
// Fechar a conexão
$conn->close();
?>