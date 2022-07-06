<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cards Distributor!!</title>
	  <link href="css/style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	</head>
	<body>

	<div class="container">
		<img src="img/logo.png">
	  <form action="" method="POST" id="card-form">
			<div class="row">
				<label>Total Players</label>
				<input type="number" name="total_player" placeholder="Give me a number?" required = true>
			</div>
			<div class="row">
			  <input class="btn" id="submit" type="submit" value="Submit">
			</div>
	  </form>
		<div class="result-container" id="result_card_detail"></div>
	</div>


	<script type="text/javascript">
	$(document).ready(function() {
		$('#card-form').submit(function(e) {
			//disable submit button for multiple submit before done distributing cards
			$('#submit').prop('disabled', true);
			e.preventDefault();
			$.ajax({
				type: "POST",
				url: 'ajax/distribute.php',
				data: $(this).serialize(),
				success: function(response){
					//enable submit button
					$('#submit').prop('disabled', false);
					$('#result_card_detail').html(response);
				},
				error: function(response) {
	        console.log("data error : " + response);
	      }
		   });
		 });
	});
	</script>
	</body>
</html>
