<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Importar dados do Excel</title>
	<head>
	<body>
		<h1>Upload Excel</h1>
		
		<form method="POST" action="processa" enctype="multipart/form-data" >
			<label>Arquivo</label>
			@csrf
			<input type="file" name="arquivo"><br><br>
			<input type="hidden" name="_token" value="{{@csrf_token()}}" class="hidden">
			<input type="submit" value="Enviar">
		</form>
		
	</body>
</html>