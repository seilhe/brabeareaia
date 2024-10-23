<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir o arquivo de conexão
include "conexao.php"; // Verifique o caminho aqui

// Consultar todos os registros
$sql = "SELECT * FROM abc ORDER BY id_usuario DESC"; 
$sql2 = "SELECT * FROM dados_bancarios ORDER BY nome_banco DESC"; 
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Registros</title>
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
    </style>
</head>
<body>

<h1>Registros da Barbearia</h1>

<table class="tabela-registros-barbearia">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Banco</th>
            <th>Agência</th>
            <th>Conta</th>
            <th>Chave PIX</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Armazenar os dados em arrays
        $dados_abc = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dados_abc[] = [
                    'id' => $row['id_usuario'],
                    'nome' => $row['nome'],
                    'email' => $row['email'],
                    'data_de_nascimento' => $row['data_de_nascimento'],
                ];
            }
        }

        $dados_bancarios = [];
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $dados_bancarios[] = [
                    'banco' => $row2['nome_banco'],
                    'agencia' => $row2['numero_agencia'],
                    'conta' => $row2['numero_conta'],
                    'chave_pix' => $row2['chave_pix'],
                ];
            }
        }

        // Exibir os dados combinados
        $maxRows = max(count($dados_abc), count($dados_bancarios));
        for ($i = 0; $i < $maxRows; $i++) {
            echo "<tr>";
            // Dados da tabela abc
            echo "<td>" . (isset($dados_abc[$i]['id']) ? $dados_abc[$i]['id'] : '') . "</td>";
            echo "<td>" . (isset($dados_abc[$i]['nome']) ? $dados_abc[$i]['nome'] : '') . "</td>";
            echo "<td>" . (isset($dados_abc[$i]['email']) ? $dados_abc[$i]['email'] : '') . "</td>";
            echo "<td>" . (isset($dados_abc[$i]['data_de_nascimento']) ? $dados_abc[$i]['data_de_nascimento'] : '') . "</td>";
            
            // Dados da tabela dados_bancarios
            echo "<td>" . (isset($dados_bancarios[$i]['banco']) ? $dados_bancarios[$i]['banco'] : '') . "</td>";
            echo "<td>" . (isset($dados_bancarios[$i]['agencia']) ? $dados_bancarios[$i]['agencia'] : '') . "</td>";
            echo "<td>" . (isset($dados_bancarios[$i]['conta']) ? $dados_bancarios[$i]['conta'] : '') . "</td>";
            echo "<td>" . (isset($dados_bancarios[$i]['chave_pix']) ? $dados_bancarios[$i]['chave_pix'] : '') . "</td>";
            echo "</tr>";
        }

        if (empty($dados_abc) && empty($dados_bancarios)) {
            echo "<tr><td colspan='8'>Nenhum registro encontrado.</td></tr>";
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