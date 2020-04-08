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
	.addstudent {
		background-color: #4CAF50;
		color: white;
		padding: 16px 20px;
		margin: 8px 0;
		border: none;
		cursor: pointer;
		width: 100%;
		opacity: 0.9;
	}

	.addstudent:hover {
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
		$studentID = $value[0];
		$studentname = $value[1];
		$studentGender = $value[2];
		$studentDOB = $value[3];
		$studentadress = $value[4];
		$studentusername = $value[5];
		$studentpassword = $value[6];
		?>

		<form action="/action_page.php">
			<div class="container">
				<h1>Add a student</h1>
				<hr>
				<label for="fname">Student Name :</label><br>
				<input type="text" id="studentname" name="studentname" value="<?php echo $studentname; ?> " placeholder="add student name here">
				<br><br>
				<label for="lname">Student Gender:</label><br>
				<input type='number' id="studentgender" name="studentgender" value="<?php echo $studentgender; ?> "><br><br>
				<br>
				<label>Student date of birth</label>
				<input type="date" id="start" name="student_dob" value="<?php echo $student_dob; ?> " min="1980-01-01" max="2002-12-31">
				<br>
				<label for="lname">Student address:</label><br>
				<input type='text' id="adress" name="studentadress" value="<?php echo $studentadress; ?> "><br><br>
				<label for="lname">Student mail:</label><br>
				<input type='text' id="mail" name="studentmail" value="<?php echo $studentmail; ?> "><br><br>
				<label for="lname">Student username:</label><br>
				<input type='text' id="username" name="studentusername" value="<?php echo $studentusername; ?> "><br><br>
				<label for="lname">Student password:</label><br>
				<input type='text' id="pass" name="studentpassword" value="<?php echo $studentpassword; ?> "><br><br>
				<hr>
				<p>Back to home page <a href="#">HOME</a>.</p>

				<button type="submit" class="addstudent">Add this student</button>
			</div>
		</form>
		<?php
	}
	?>
</body>
</html>
