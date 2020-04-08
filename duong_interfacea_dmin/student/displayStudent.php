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
			$studentID = $value[0];
			$studentname = $value[1];
			$studentGender = $value[2];
			$studentDOB = $value[3];
			$studentadress = $value[4];
			$studentusername = $value[5];
			$studentpassword = $value[6];
			?>
			<tbody>
				<tr>
					<td><?php echo $studentID; ?></td>
					<td><?php echo $studentname; ?></td>
					<td><?php echo $studentGender; ?></td>
					<td><?php echo $studentDOB; ?></td>
					<td><?php echo $studentadress; ?></td>
					<td><?php echo $studentusername; ?></td>
					<td><?php echo $studentpassword; ?></td>
					<form method = "post" action= "controller_Module.html_product_editrequest">
						<input type="hidden" name="id" value="<?php echo $productId; ?>">
						<td><button class="btn btn-primary" name = "editThis" > Edit </button></td>
					</form>
					<form method = "post" action= "controller_Module.html_product_delete">
						<input type="hidden" name="id" value="<?php echo $productId; ?>">
						<td><button class="btn btn-primary" name = "deleteThis" >Delete</button></td>
					</form>
				</tr>
			</tbody>
		<?php } ?>
	</table>
</center>
<p>Back to home page <a href="#">HOME</a>.</p>