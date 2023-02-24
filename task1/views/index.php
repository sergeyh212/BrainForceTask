<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="/js/jquery.js"></script>
	<script src="/js/jquery.inputmask.js"></script>
	<script src="/js/script.js"></script>
	<title>Task 1</title>
</head>

<body>
	<div class="text-center container">
		<form method="POST">
			<div>
				<h2>Марка</h2>
				<select id="brand" class=""></select>
			</div>
			<div class=" mt-2">
				<h2>Модель</h2>
				<select id="model"></select>
			</div>
			<div class="mt-2">
				<h2>Тип запчасти</h2>
				<select id="detail"></select>
			</div>
			<div class="mt-2">
				<h2>Имя</h2>
				<input type="text" id="name" class="col-lg-1">
			</div>
			<div class="mt-2">
				<h2>Телефон</h2>
				<input id="number" type="text" class="col-lg-1">
			</div>
			<div class="mt-2">
				<button type="submit" class="btn btn-primary">Отправить</button>
			</div>
		</form>
	</div>

</body>

</html>