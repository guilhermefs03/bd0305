<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Livros</title>
    <script>
        function searchBook() {
            var input = document.getElementById('bookInput').value;
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
            xhr.open('GET', 'search_book.php?q=' + input, true);
            xhr.send();
        }
    </script>
</head>
<body>
    <h1>Consulta de Livros</h1>
    <input type="text" id="bookInput" onkeyup="searchBook()" placeholder="Digite o nome do livro...">
    <div id="results"></div>
</body>
</html>
