<?php
	include_once("conn.php");
	$autor = $_POST['txtAutor'];

	$result_autor = "INSERT INTO tbautor(nomeAutor) VALUES ('$autor')";

	$resultado_autor = mysqli_query($conn, $result_autor);

	if (mysqli_affected_rows($conn) !=0) 
	{
		echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php'>
				<script type=\"text/javascript\">
					alert(\"Autor cadastrado com sucesso.\");
				</script>
			";
	}

	else
	{
		echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadAutor.php'>
				<script type=\"text/javascript\">
					alert(\"Falha no cadastro do autor.\");
				</script>
			";
	}



?>