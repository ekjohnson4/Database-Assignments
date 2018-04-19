<?php 
	$user = "jsburgin";
	$cwid = "11484207";
	$server = "cs-sql2014.ua-net.ua.edu";
	// create the connection to mySQL
	$con = new mysqli($server, $user, $cwid, $user);
	
	$ssn = $_POST["ssn"];
	$name = $_POST["name"];
	$address = $_POST["address"];
	$title = $_POST["title"];
	$error = '';
	
	if (!$ssn || !$name || !$title || !$address) {
		$error = "Failed to create employee. Please provide all fields. ";
	}
	
	if (strlen($ssn) != 11) {
		$error = $error . "SSN must be 11 characters long.";
	}
	
	if (!$error) {
		$con->query("INSERT INTO employee (ssn, name, address, title) values ('$ssn', '$name', '$address', '$title')");	
	}

	$columns = $con->query("SHOW COLUMNS FROM employee");	
	$rows = $con->query("SELECT * FROM employee");	
?>

<!doctype html>

<html>
<head>
	<title>Task 4a - Songs</title>
	<link href="/~jsburgin/style.css" rel="stylesheet" />
</head>
	
<body>
	<a href="/~jsburgin" class="return-link">Return to Main Page</a>		
	<?php if ($error) { echo "<p>$error</p>"; } else { ?>
	
	<div class="section">
		<p>Employee created successfully. Return home to query the employee table.</p>
		<h3>Showing All Employees</h3>
		<table>
			<thead>
				<tr>
					<?php while ($column = mysqli_fetch_row($columns)) { ?>
						<th><?php echo $column[0]; ?></th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php while ($row = mysqli_fetch_row($rows)) { ?>
					<tr>
						<?php foreach($row as $value) {?>
							<td><?php echo $value ?></td>
						<?php } ?>
					</tr>
				<?php }} ?>
			</tbody>
		</table>
	</div>
</body>
</html>