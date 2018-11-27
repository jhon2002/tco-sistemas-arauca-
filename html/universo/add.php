<?php 
	$con = mysqli_connect('localhost', 'root', '', 'universo');

	if (mysqli_connect_errno()) {
		echo "Error: ".mysqli_connect_error();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Universo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300" rel="stylesheet"> 
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
	<style>
		body {
			font-family: 'Quicksand', sans-serif;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">
				<h1 class="text-center">Base de Datos Universo</h1>
				<br>
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="./">Lista de Planetas</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Adicionar Planeta</li>
				  </ol>
				</nav>
				<br><br>
				<h2><i class="fa fa-plus"></i> Adicionar Planeta</h2>
				<hr>
				<form action="" method="post">
					<div class="form-group">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
					</div>
					<div class="form-group">
						<input type="number" name="orden" class="form-control" placeholder="Orden" required>
					</div>
					<div class="form-group">
						<input type="number" name="lunas" class="form-control" placeholder="Lunas" required>
					</div>
					<div class="form-group">
						<button class="btn btn-success"> <i class="fa fa-save"></i> Guardar</button>
					</div>
				</form>
				<?php 
					if ($_POST) {
						$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
						$orden  = mysqli_real_escape_string($con, $_POST['orden']);
						$lunas  = mysqli_real_escape_string($con, $_POST['lunas']);

						$sql = "insert into planetas values(default,'$nombre',$orden,$lunas)";

						if (mysqli_query($con ,$sql)) {
							echo "<script>";
							echo "alert('Planeta Adicionado con Exito!');";
							echo "window.location.replace('./')";
							echo "</script>";

						} else {
							echo "Error:".mysqli_error($con);
						}
					}

				?>
			</div>
		</div>
	</div>
</body>
</html>
