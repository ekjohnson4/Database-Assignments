<?php 
	$user = "jsburgin";
	$cwid = "11484207";
	$server = "cs-sql2014.ua-net.ua.edu";
	// create the connection to mySQL
	$con = new mysqli($server, $user, $cwid, $user);
	$tables = $con->query("SHOW TABLES");
	
	function getRows($con, $tname) {
		return $con->query("SELECT * FROM " . $tname);
	}
	
	function getColumns($con, $tname) {
		return $con->query("SHOW COLUMNS FROM ". $tname);
	}
?>

<!doctype html>
<html>
<head>
	<title>Task 3</title>
	<link href="/~jsburgin/style.css" rel="stylesheet" />
</head>
	
<body>
	<a href="/~jsburgin" class="return-link">Return to Main Page</a>
	<?php
		while ($table = mysqli_fetch_row($tables)) {
			$columns = getColumns($con, $table[0]);
			$rows = getRows($con, $table[0]); ?>
			
			<div class="section">
				<h3><?php echo $table[0] ?></h3>
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
						<?php } ?>
					</tbody>
				</table>
			</div>
		<?php } ?>
</body>
</html>