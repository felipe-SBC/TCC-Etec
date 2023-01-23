<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./estilos/estilopost.css">
	<title>Post</title>
</head>


<body>
	<div id="postagens">
		<form method="POST" enctype="multipart/form-data" action="imagempost.php"><br />
			<textarea placeholder="Escreva uma nova publicação" name="texto" name="texto_apenas"></textarea>

			<label>Arquivo</label>
			<input type="file" name="arquivo">

			<input type="submit" value="Publicar" name="Postar">

		</form>
	</div>

</body>

</html>
