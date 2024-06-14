<?php
	include_once("conn.php");
	$selAut = $_POST['selectAutor'];
	$selGen = $_POST['selectGenero'];
	$txtLivro = $_POST['txtLivro'];
	$nAno = $_POST['nAno'];
	$txtEdicao = $_POST['txtEdicao'];
	$txtDescricao = $_POST['txtDescricao'];
	$selStatus = $_POST['selectStatus'];

	if ($selStatus == 'Disponivel') 
	{
		$selStatus = 1;
	}

	else if ($selStatus == 'Indisponivel') 
	{
		$selStatus = 0;
	}

	$result_usuario = "INSERT INTO tblivro(nomeLivro, codAutor, codGenero, anoLancamento, edicaoLivro, descricaoLivro, statusLivro) VALUES ('$txtLivro','$selAut','$selGen','$nAno','$txtEdicao','$txtDescricao','$selStatus')";
	$resultado_usuario = mysqli_query($conn, $result_usuario);

	if(mysqli_affected_rows($conn) != 0)
	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadLivro.php'>
		<script type=\"text/javascript\">
			alert(\"Livro castrado com Sucesso. \");
			</script>
			";		
	}

	else {
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=cadLivro.php'>
			<script type=\"text/javascript\">
				alert(\"O Filme não foi cadastrado com Sucesso.\");
			</script>

		";
	}
?>