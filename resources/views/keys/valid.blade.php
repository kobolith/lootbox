<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Open Lootbox</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class = "font-press-start">

	<div class="container bg-amber-100 h-max py-6">
		@foreach ($keys as $key)
			<div class="flex justify-center bg-emerald-200 my-4 mx-40 p-3">
				<div class="text-m">
					{{ $key }}
				</div>
			</div>
		@endforeach
	</div>

	<script src="https://code.jquery.com/jquery-3.6.3.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>
