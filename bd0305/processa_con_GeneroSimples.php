<?php
    include_once("conn.php");

    if (isset($_GET['genero'])) {
        // Limpar a entrada para evitar SQL Injection
        $search_term = mysqli_real_escape_string($conn, $_GET['genero']);
    
        // Consultar o banco de dados
        $sql = "SELECT * FROM tbgenero WHERE genero LIKE '$search_term%'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            // Exibir os resultados
            echo "<h2>Resultados:</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row['genero'] . "</p>";
            }
        } else {
            echo "<p>Nenhum resultado encontrado.</p>";
        }
    }
    
?>