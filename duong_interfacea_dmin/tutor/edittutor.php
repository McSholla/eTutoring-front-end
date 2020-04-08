	<?php 
$row = $_SESSION['row']; // data taken from the model : using fetch all
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	body {
		font-family: Arial, Helvetica, sans-serif;
		background-color: black;
	}

	* {
		box-sizing: border-box;
	}

	/* Add padding to containers */
	.container {
		padding: 16px;
		background-color: white;
	}

	/* Full-width input fields */
	input[type=text], input[type=password] {
		width: 100%;
		padding: 15px;
		margin: 5px 0 22px 0;
		display: inline-block;
		border: none;
		background: #f1f1f1;
	}

	input[type=text]:focus, input[type=password]:focus {
		background-color: #ddd;
		outline: none;
	}

	/* Overwrite default styles of hr */
	hr {
		border: 1px solid #f1f1f1;
		margin-bottom: 25px;
	}

	/* Set a style for the submit button */
	.edittutor {
		background-color: #4CAF50;
		color: white;
		padding: 16px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
		opacity: 0.9;
	}

	.edittutor:hover {
		opacity: 1;
	}

	/* Add a blue text color to links */
	a {
		color: dodgerblue;
	}

	/* Set a grey background color and center the text of the "sign in" section */
	.signin {
		background-color: #f1f1f1;
		text-align: center;
	}
</style>
</head>
<body>


	<?php
	foreach($row as $value) {
		$tutorID = $value[0];
		$tutorname = $value[1];
		$tutorGender = $value[2];
		$tutorDOB = $value[3];
		$tutoradress = $value[4];
		$tutormail = $value[5];
		$tutorstudent = $value[6];
		?>

		<form action="/action_page.php">
			<div class="container">
				<h1>Add a student</h1>
				<hr>
				<label for="fname">tutor Name :</label><br>
				<input type="text" id="tutorname" name="tutorname" value="<?php echo $tutorname; ?> " placeholder="add student name here">
				<br><br>
				<label for="lname">tutor Gender:</label><br>
				<input type='number' id="tutorgender" name="tutorgender" value="<?php echo $tutorGender; ?> "><br><br>
				<br>
				<label>tutor date of birth</label>
				<input type="date" id="start" name="tutor_dob" value="<?php echo $tutorDOB; ?> " min="1980-01-01" max="2002-12-31">
				<br>
				<label for="lname">tutor address:</label><br>
				<input type='text' id="adress" name="tutoradress" value="<?php echo $tutoradress; ?> "><br><br>
				<label for="lname">tutor mail:</label><br>
				<input type='text' id="mail" name="tutormail" value="<?php echo $tutormail; ?> "><br><br>
				<label for="lname">tutor student:</label><br>
				<input type='text' id="mail" name="tutorstudent" value="<?php echo $tutorstudent; ?> "><br><br>
				<p>Back to home page <a href="#">HOME</a>.</p>

				<button type="submit" class="edittutor">edit this student</button>
			</div>
		</form>
		<?php
	}
	?>
</body>
</html>
