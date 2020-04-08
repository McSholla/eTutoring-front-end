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
			$staffID = $value[0];
			$staffname = $value[1];
			$staffGender = $value[2];
			$staffDOB = $value[3];
			$staffadress = $value[4];
			$staffusername = $value[5];
			$staffpassword = $value[6];
			?>
			<tbody>
				<tr>
					<td><?php echo $staffID; ?></td>
					<td><?php echo $staffname; ?></td>
					<td><?php echo $staffGender; ?></td>
					<td><?php echo $staffDOB; ?></td>
					<td><?php echo $staffadress; ?></td>
					<td><?php echo $staffusername; ?></td>
					<td><?php echo $staffpassword; ?></td>
					<form method = "post" action= "controller_Module.html_product_editrequest">
						<input type="hidden" name="id" value="<?php echo $staffId; ?>">
						<td><button class="btn btn-primary" name = "editThis" > Edit </button></td>
					</form>
					<form method = "post" action= "controller_Module.html_product_delete">
						<input type="hidden" name="id" value="<?php echo $staffId; ?>">
						<td><button class="btn btn-primary" name = "deleteThis" >Delete</button></td>
					</form>
				</tr>
			</tbody>
		<?php } ?>
	</table>
</center>
<p>Back to home page <a href="#">HOME</a>.</p>