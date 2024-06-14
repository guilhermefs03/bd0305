<?php
	include_once("conn.php");
	$genero = $_POST['txtGenero'];


	$result_genero = "INSERT INTO tbgenero(genero) VALUES ('$genero')";

	$resultado_genero = mysqli_query($conn, $result_genero);


	if (mysqli_affected_rows($conn) !=0) 
	{
		echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php'>
				<script type=\"text/javascript\">
					alert(\"Gênero de filme cadastrado com sucesso.\");
				</script>
			";
	}

	else
	{
		echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadGenero.php'>
				<script type=\"text/javascript\">
					alert(\"Falha no cadastro do gênero.\");
				</script>
			";
	}
?>