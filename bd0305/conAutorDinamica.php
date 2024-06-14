<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Autores</title>
    <script>
        function searchAuthor() {
            var input = document.getElementById('authorInput').value;
            if (input.length === 0) {
                document.getElementById('results').innerHTML = '';
                return;
            }
            
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('results').innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', 'search_author.php?q=' + input, true);
            xhr.send();
        }
    </script>
</head>
<body>
    <h1>Consulta de Autores</h1>
    <input type="text" id="authorInput" onkeyup="searchAuthor()" placeholder="Digite o nome do autor...">
    <div id="results"></div>
</body>
</html>
