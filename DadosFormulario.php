<?php
session_start(); // Iniciar a sessão

include "conexao.php";

echo "<pre>";

print_r($_POST);

// Dados do usuário
$nome = $_POST['nome'];
$email = $_POST['email'];
$data_de_nascimento = $_POST['data_de_nascimento'];
$id_grupo = $_POST['id_grupo'];

// Dados bancários
$nome_banco = $_POST['nome_banco'];
$numero_conta = $_POST['numero_conta'];
$numero_agencia = $_POST['numero_agencia'];
$chave_pix = $_POST['chave_pix'];

// Inserção na tabela 'abc'
$sql_abc = "INSERT INTO abc (nome, email, data_de_nascimento, id_grupo)
VALUES ('$nome', '$email', '$data_de_nascimento', '$id_grupo')";

$sql_dados = "INSERT INTO dados_bancarios (nome_banco, numero_conta, numero_agencia, chave_pix )
VALUES ('$nome_banco', '$numero_conta', '$numero_agencia', '$chave_pix')";

if ($conn->query($sql_abc) === TRUE) {
    // Obter o último id_usuario inserido
    $last_id = $conn->insert_id; // Pega o último id inserido

    // Salvar na sessão
    $_SESSION['id_usuario'] = $last_id;

    // Redirecionar após o registro
    header("Location: visualizar_registros.php");
} else {
    echo "Error: " . $sql_abc . "<br>" . $conn->error;
}

if ($conn->query($sql_dados) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql_dados . "<br>" . $conn->error;
}

$conn->close();
?>