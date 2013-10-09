<?php

	require("connection.php");

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Lead Example</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="css/ajax_demo.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

	<script type="text/javascript">

		$(document).ready(function() {

			$('.date').datepicker();

			$('#search_text').keyup(function() {
				$('#test_form').submit();
			});

			$('.date').on('change', function() {
				$('#test_form').submit();
			});

			$('#paginate li input').click(function() {
				var page = $(this).attr("name");
				$('#page_pass').attr("value", page);
				$('#test_form').submit();
			});

			$('#test_form').submit(function() {
				$.post(
					$(this).attr('action'),
					$(this).serialize(),
					function(data) {
						$('#results').html(data.html);
					},
					"json"
				); //end post
				return false;
			}); //end submit

			$('#test_form').submit();

		}); //end ready

	</script>

</head>
<body>

	<div id="wrapper">
		
		<form id="test_form" action="process.php" method="post">
			
			Name: <input id="search_text" type="text" name="search_name">
			From: <input id="from" class="date" type="text" name="from_date">
			To: <input id="to" class="date" type="text" name="to_date">

			<input type="submit" value="Submit" class="btn btn-primary">
			<input id="page_pass" type="hidden" name="page" value="0">

			<ul id="paginate">
				<li class="border"><input type="submit" name="0" value="1" class="btn btn-link"></li>
				<li class="border"><input type="submit" name="30" value="2" class="btn btn-link"></li>
				<li class="border"><input type="submit" name="60" value="3" class="btn btn-link"></li>
				<li class="border"><input type="submit" name="90" value="4" class="btn btn-link"></li>
				<li class="border"><input type="submit" name="120" value="5" class="btn btn-link"></li>
				<li class="border"><input type="submit" name="150" value="6" class="btn btn-link"></li>
				<li class="border"><input type="submit" name="180" value="7" class="btn btn-link"></li>
				<li class="border"><input type="submit" name="210" value="8" class="btn btn-link"></li>
				<li class="border"><input type="submit" name="240" value="9" class="btn btn-link"></li>
				<li class="border"><input type="submit" name="270" value="10" class="btn btn-link"></li>
				<li class="border"><input type="submit" name="300" value="11" class="btn btn-link"></li>
				<li><input type="submit" name="330" value="12" class="btn btn-link"></li>
			</ul>
		</form>

		<div id="results"></div>

	</div>
	
</body>
</html>