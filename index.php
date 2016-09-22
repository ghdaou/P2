<?php
error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1); # Display errors on page (instead of a log file)
?>

<!DOCTYPE html>
<html>
	<head>

		<meta charset='utf-8'>

		<title>xkcd Password Generator</title>

		<link rel='stylesheet' href='style.css'>

		<?php require('logic.php'); ?>

	</head>

	<body>

		<h1>PASSWORD GENERATOR</h1>
		<div class='error'>
			<?php if(isset($displayError)) {echo $displayError; }?>
		</div>

		<div class="resultDisplay">
			<?php echo $result;?>
		</div>

		<div class="formStyle">


			<form method='POST' action='index.php'>

				Enter the desired number of words(1-9)<input type='text' name='numberOfWords'><br>
				Would you like to use a Number<input type='checkbox' name='numberIncluded' value="Yes"><br>
				Would you like to use a special character<input type='checkbox' name='includeSpSymbol' value="Yes"><br>

				<input type='submit' value='Generate Password'><br>

			</form>

		</div>
	</body>
</html>
