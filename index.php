<?php

ini_set("display_errors", true);
include_once 'db.php';

?>
<!DOCTYPE html>
<html>

<head>
	
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>



<body>
	<div class="container">
	<form action="index.php" method="POST" name="submit" class="container">
		<select name="Crime_Type">
			<option value="">Crime Type</option>
			<?php
			$sqli = "SELECT DISTINCT Crime_type FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['Crime_type'] . '</option>';
			}
			?>
		</select>
		<select name="Reported_by">
			<option value="">Reported by</option>
			<?php
			$sqli = "SELECT DISTINCT Reported_by FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['Reported_by'] . '</option>';
			}
			?>
		</select>
		<select name="Falls_within">
			<option value="">Falls within by</option>
			<?php
			$sqli = "SELECT DISTINCT Falls_within FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['Falls_within'] . '</option>';
			}
			?>
		</select>
		<!-- <select name="Longitude">
			<option value="">Longitude</option>
			<//?php
			$sqli = "SELECT DISTINCT Longitude FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['Longitude'] . '</option>';
			}
			?>
		</select>
		<select name="Latitude">
			<option value="">Latitude</option>
			<//?php
			$sqli = "SELECT DISTINCT Latitude FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['Latitude'] . '</option>';
			}
			?>
		</select> -->
		<select name="Location">
			<option value="">Location</option>
			<?php
			$sqli = "SELECT DISTINCT Location FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['Location'] . '</option>';
			}
			?>
		</select>
		<select name="LSOA_code">
			<option value="">LSOA Code</option>
			<?php
			$sqli = "SELECT DISTINCT LSOA_Code FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['LSOA_Code'] . '</option>';
			}
			?>
		</select>
		<select name="LSOA_name">
			<option value="">LSOA Name</option>
			<?php
			$sqli = "SELECT DISTINCT LSOA_Name FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['LSOA_Name'] . '</option>';
			}
			?>
		</select>
		<select name="last_outcome_category">
			<option value="">Last Outcome Category</option>
			<?php
			$sqli = "SELECT DISTINCT last_outcome_category FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['last_outcome_category'] . '</option>';
			}


			?>

		</select>
		<button type="submit" name="submit" class="button"></span> Search Database</button>
	</form>

	<div class="container">
		<h1 class="m-0 font-weight-bold text-success">Database Results</h1>
	</div>

	<table class="content-table container">
		<thead>
			<tr>
				<th>Crime type</th>
				<th>Reported by</th>
				<th>Falls within by</th>
				<th>Longitude</th>
				<th>Latitude</th>
				<th>Location</th>
				<th>LSOA code</th>
				<th>LSOA name</th>
				<th>Last outcome category</th>
			</tr>
		</thead>

		<?php
		// fetch data
		$sql = "SELECT * FROM west_crime_1";
		$where = [];

		$filters = array("Crime_Type", 'Falls_within', 'Reported_by', 'LSOA_code', 'LSOA_name', 'last_outcome_category');
		//				echo "<pre>Where array\n";
		foreach ($filters as $filter) {
			if (isset($_POST[$filter]) && $_POST[$filter] != '') {
				$cleaned_string = $conn->real_escape_string($_POST[$filter]); // protection from unsafe values
				$where[] = "`" . $filter . "`='" . $cleaned_string . "'";
			} else {
				//echo $filter.": not set\n";
			}
		}
		//					print_r($where);


		$where[] = "1";
		$sql .= " WHERE " . implode(" AND ", $where) . ";";
		//					echo "\n\n".$sql;
		//					echo "</pre>";
		$result = $conn->query($sql);


		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {

		?>

				<tr>
					<td><?php echo $row['Crime_type']; ?></td>
					<td><?php echo $row['Reported_by']; ?></td>
					<td><?php echo $row['Falls_within']; ?></td>
					<td><?php echo $row['Longitude']; ?></td>
					<td><?php echo $row['Latitude']; ?></td>
					<td><?php echo $row['Location']; ?></td>
					<td><?php echo $row['LSOA_code']; ?></td>
					<td><?php echo $row['LSOA_name']; ?></td>
					<td><?php echo $row['last_outcome_category']; ?></td>
				</tr>


		<?php

			}
		}
		?>



	</div>
</body>

</html>