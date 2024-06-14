<?php 
	include_once("conn.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de Livro</title>
</head>
<body>
	<form method="POST" action="processa_cad_livros.php">
		<!--Nome livro-->
		Nome do Livro: <input type="text" name="txtLivro"><br><br>
		<label>Selecione o Autor: </label> <br><br>
		<!--Nome livro-->

		<!--Autor-->
		<select name="selectAutor">
			<option>Selecione</option>
			<?php
				$result_niveis_acessos = "SELECT * FROM tbautor";
				$resultado_niveis_acesso = mysqli_query($conn, $result_niveis_acessos);
				while($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)){ ?>
					<option value="<?php echo $row_niveis_acessos['codAutor']; ?>">
						<?php echo $row_niveis_acessos['nomeAutor']; ?>
					</option> <?php

				}

				?>
		</select><br><br>
		<!--Autor-->

		<!--Genero-->
		<label>Selecione o Gênero: </label> <br><br>
		<select name="selectGenero">
			<option>Selecione</option>
			<?php
				$result_niveis_acessos = "SELECT * FROM tbgenero";
				$resultado_niveis_acesso = mysqli_query($conn, $result_niveis_acessos);
				while($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)){ ?>
					<option value="<?php echo $row_niveis_acessos['codGenero']; ?>">
						<?php echo $row_niveis_acessos['genero']; ?>
					</option> <?php

				}

			?>
		</select><br><br>
		<!--Genero-->

		<!--Ano de lançamento-->
		<label>Insira o ano de lançamento do livro: </label>
		<input type="number" name="nAno" min="1700" max="2024"><br><br>
		<!--Ano de lançamento-->

		<!--Edicao-->
		<label>Edição do Livro: </label>
		<input type="text" name="txtEdicao"><br><br>
		<!--Edicao-->

		<!--Descricao-->
		<label>Descrição do Livro: </label><br>
		<textarea name="txtDescricao"></textarea><br><br>
		<!--Descricao-->


		<!--Status-->
		<label>Status do livro: </label>
		<select name="selectStatus">
			<option>Disponivel</option>,
			<option>Indisponivel</option>
		</select><br><br>
		<!--Status-->

		<input type="submit" value="Cadastrar">
	</form>
</body>
</html>