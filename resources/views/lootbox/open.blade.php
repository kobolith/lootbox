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
	
	<script>
		function shuffleArray(array) {
    	for (let i = array.length - 1; i > 0; i--) {
    	    const j = Math.floor(Math.random() * (i + 1));
    	    [array[i], array[j]] = [array[j], array[i]];
    	}
}

		function selectionIllusion(trueLoot) {
			let lootList = $('div[id^="loot-"]');
			shuffleArray(lootList); 

			function setTrueLoot(trueLoot) {
				$(trueLoot).removeClass("bg-amber-200").addClass("bg-green-400");
			}

			function changeColor(index) {
				if (index >= lootList.length) {
					setTrueLoot(trueLoot)
					return;
				}
				
				let element = lootList.eq(index);
				console.log(element);
				element.removeClass("bg-amber-200").addClass("bg-green-200");
				
				setTimeout(() => {
					element.removeClass("bg-green-200").addClass("bg-amber-200");
					changeColor(index + 1);
				}, 100);
			}

			changeColor(0);
		}
		
		function openLootbox() {
			$.ajax({
				type:'POST',
				url:'/open',
				data: {
					'_token' : '<?php echo csrf_token() ?>',
					'lootboxKey' : $('#lootboxKey').val()
				},
				statusCode: {
					200: function(data) {
						selectionIllusion(data.index);
					},
					404: function(data) {
						alert('Entered key is invalid');
						$('#lootboxKey').val('');
					},
					406: function(data) {
						alert('Entered key is expired');
						$('#lootboxKey').val('');
					}
				}				
			})
		};
	</script>

	<div class="container bg-amber-100 h-full pt-6">
		@foreach ($loots as $loot)
			<div id="loot-{{ $loop->index }}" class="flex items-center bg-amber-200 my-4 mx-40 p-3">
				<div class="flex-initial w-48 text-center">
					<b aria-label="{{ strtolower($loot->friendly_grade) }}">{{ $loot->friendly_grade }}</b>
				</div>
				<div aria-label="{{ strtolower($loot->friendly_grade) }}" class="flex-initial text-sm">
					{{ $loot->friendly_name }}
				</div>
			</div>
		@endforeach
		<form onsubmit="return false" method="post">
			<div class="flex justify-center space-x-6 mt-12">
				<input placeholder="Lootbox Key" required type="text" class="w-5/12 form-control" name="lootboxKey" id="lootboxKey">
				<input type="submit" value="Open Lootbox" onclick="openLootbox()" class="form-control btn btn-light">
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			</div>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.3.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>
