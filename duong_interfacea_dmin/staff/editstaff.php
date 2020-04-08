<?php 
$row = $_SESSION['row']; // data taken from the model : using fetch all
?>

<?php
foreach($row as $value) {
	$staffID = $value[0];
	$staffname = $value[1];
	$staffGender = $value[2];
	$staffDOB = $value[3];
	$staffadress = $value[4];
	$staffusername = $value[5];
	$staffpassword = $value[6];
	?>
	<label for="fname">staff Name :</label><br>
	<input type="text" value="<?php echo $staffID ?>" id="staffname" name="staffname" placeholder="add student name here">
	<br><br>
	<label for="lname">staff Gender:</label><br>
	<input type='number' value="<?php echo $staffGender ?>" id="staffgender" name="staffgender" ><br><br>
	<br>
	<label>staff date of birth</label>
	<input type="date"  id="start" name="staff_dob" value="<?php echo $staffDOB ?>" min="1980-01-01" max="2002-12-31">
	<br>
	<label for="lname">staff address:</label><br>
	<input type='text' id="adress" name="staffadress" value="<?php echo $staffadress ?>"><br><br>
	<label for="lname">staff mail:</label><br>
	<input type='text' id="mail" name="staffmail" value="<?php echo $staffID ?>"><br><br>
	<label for="lname">staff username:</label><br>
	<input type='text' id="username" name="staffusername" value="<?php echo $staffusername ?>"><br><br>
	<label for="lname">staff password:</label><br>
	<input type='text' id="pass" name="staffpassword" value="<?php echo $staffpassword ?>"><br><br>
	<?php
}
?>