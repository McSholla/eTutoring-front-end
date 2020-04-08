<?php 
$row = $_SESSION['row']; // data taken from model : using feftch all
?>

<center>
	<table class="table" style="margin: auto" >
		<thead>
			<tr>
				<th class="col">ID</th>
				<th class="col">Name</th>
				<th class="col">Gender</th>
				<th class="col">DOB</th>
				<th class="col">adress</th>
				<th class="col">username</th>
				<th class="col">password</th>
			</tr>
		</thead>
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
			<tbody>
				<tr>
					<td><?php echo $tutorID; ?></td>
					<td><?php echo $tutorname; ?></td>
					<td><?php echo $tutorGender; ?></td>
					<td><?php echo $tutorDOB; ?></td>
					<td><?php echo $tutoradress; ?></td>
					<td><?php echo $tutormail; ?></td>
					<td><?php echo $tutorstudent; ?></td>
					<form method = "post" action= "controller_Module.html_product_editrequest">
						<input type="hidden" name="id" value="<?php echo $tutorId; ?>">
						<td><button class="btn btn-primary" name = "editThis" > Edit </button></td>
					</form>
					<form method = "post" action= "controller_Module.html_product_delete">
						<input type="hidden" name="id" value="<?php echo $tutorId; ?>">
						<td><button class="btn btn-primary" name = "deleteThis" >Delete</button></td>
					</form>
				</tr>
			</tbody>
		<?php } ?>
	</table>
</center>
<p>Back to home page <a href="#">HOME</a>.</p>