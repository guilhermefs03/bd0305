<?php
// Inclui o arquivo de conexão
include 'conn.php';

// Obtém o valor da consulta
$q = $_GET['q'];

// Prepara a consulta SQL com junções para obter os detalhes do livro
$sql = "SELECT l.nomeLivro, a.nomeAutor, g.genero, l.anoLancamento, l.edicaoLivro, l.descricaoLivro, l.statusLivro
        FROM tblivro l
        JOIN tbautor a ON l.codAutor = a.codAutor
        JOIN tbgenero g ON l.codGenero = g.codGenero
        WHERE l.nomeLivro LIKE ?";
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
        $status = $row["statusLivro"] == 1 ? "Disponível" : "Indisponível";
        echo "<p>";
        echo "<strong>Nome do Livro:</strong> " . htmlspecialchars($row["nomeLivro"]) . "<br>";
        echo "<strong>Autor:</strong> " . htmlspecialchars($row["nomeAutor"]) . "<br>";
        echo "<strong>Gênero:</strong> " . htmlspecialchars($row["genero"]) . "<br>";
        echo "<strong>Ano de Lançamento:</strong> " . htmlspecialchars($row["anoLancamento"]) . "<br>";
        echo "<strong>Edição:</strong> " . htmlspecialchars($row["edicaoLivro"]) . "<br>";
        echo "<strong>Descrição:</strong> " . htmlspecialchars($row["descricaoLivro"]) . "<br>";
        echo "<strong>Status:</strong> " . $status;
        echo "</p>";
    }
} else {
    echo "Nenhum livro encontrado.";
}

// Fecha a declaração e a conexão
$stmt->close();
$conn->close();
?>
