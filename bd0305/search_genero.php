<?php
// Inclui o arquivo de conexão
include 'conn.php';

// Obtém o valor da consulta
$q = $_GET['q'];

// Prepara a consulta SQL com prepared statements para evitar SQL injection
$sql = "SELECT codGenero, genero FROM tbgenero WHERE genero LIKE ?";
$stmt = $conn->prepare($sql);

// Verifica se a preparação da consulta foi bem-sucedida
if ($stmt === false) {
    die("Erro ao preparar a consulta: " . $conn->error);
}

$search = "%" . $q . "%";
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se existem resultados e os exibe
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p>" . htmlspecialchars($row["genero"]) . " (" . htmlspecialchars($row["codGenero"]) . ")</p>";
    }
} else {
    echo "Nenhum genero encontrado.";
}

// Fecha a declaração e a conexão
$stmt->close();
$conn->close();
?>
