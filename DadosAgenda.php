<?php
session_start(); // Iniciar a sessão

include "conexao.php";

echo "<pre>";

print_r($_POST);


// Captura os dados da agenda
$dia_da_semana = $_POST['dia_da_semana'];
$horario_inicio = $_POST['horario_inicio'];

// Verifica se o id_usuario está armazenado na sessão
if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];

    // Inserção da nova agenda
    $sql_agenda = "INSERT INTO agenda (id_usuario, dia_da_semana, horario_inicio) 
    VALUES ('$id_usuario', '$dia_da_semana', '$horario_inicio')";

    if ($conn->query($sql_agenda) === TRUE) {
        echo "New record created successfully";
        header("Location: lista_de_agendamentos.php");
    } else {
        echo "Error: " . $sql_agenda . "<br>" . $conn->error;
    }
} else {
    echo "Erro: ID do usuário não encontrado na sessão.";
}

$conn->close();
?>