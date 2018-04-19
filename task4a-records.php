<?php 
	$user = "jsburgin";
	$cwid = "11484207";
	$server = "cs-sql2014.ua-net.ua.edu";
	// create the connection to mySQL
	$con = new mysqli($server, $user, $cwid, $user);
	

	$rows = $con->query("SELECT record.id, record.name, inventory, length, year, price, artist.id, artist.name, genre
	 FROM record, artist, artist_record WHERE artist_record.artist_id = artist.id AND artist_record.record_id = record.id 
	 AND year >= '" . $_POST['year'] . "' ORDER BY year ASC");
?>

<!doctype html>

<html>
<head>
	<title>Task 4a - Songs</title>
	<link href="/~jsburgin/style.css" rel="stylesheet" />
</head>
	
<body>
	<a href="/~jsburgin" class="return-link">Return to Main Page</a>		
	<div class="section">
		<h3>Showing All Records & Artists Since <?php echo $_POST['year'] ?></h3>
		<table>
			<thead>
				<tr>
					<td>record.id</td>
					<td>record.name</td>
					<td>inventory</td>
					<td>length</td>
					<td>year</td>
					<td>price</td>
					<td>artist.id</td>
					<td>artist.name</td>
					<td>genre</td>
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
</body>
</html>