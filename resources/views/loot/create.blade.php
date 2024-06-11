<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<form action="{{ url('loot/new') }}" method="post">
		@csrf
		
		{{-- <label for="internalGrade">Internal Loot grade</label>
		<input type="text" name="internalGrade" id="internalGrade">
		<br> --}}
		<label for="friendlyGrade">Loot grade</label>
		<input type="text" name="friendlyGrade" id="friendlyGrade">
		<br>
		{{-- <label for="internalName">Internal Loot Name</label>
		<input type="text" name="internalName" id="internalName">
		<br> --}}
		<label for="friendlyName">Loot Name</label>
		<input type="text" name="friendlyName" id="friendlyName">
		<br>
		{{-- <label for="imageSource">Loot Image</label>
		<input type="url" name="imageSource" id=imageSource">
		<br> --}}

		<input type="submit" value="Create Loot">
	</form>
</body>
</html>