<?php
include_once 'db.php';
//select database table



?>
<!DOCTYPE html>
<html>

<head>
	<title> </title>

</head>

<body>
	<form action="index.php" method="POST" name="submit">
		<select name="Crime_Type">
			<option>Crime Type</option>
			<?php
			$sqli = "SELECT DISTINCT Crime_type FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['Crime_type'] . '</option>';
			}
			?>
		</select>

		<select name="Month">
			<option>Month</option>
			<?php
			$sqli = "SELECT DISTINCT Month FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['Month'] . '</option>';
			}
			?>
		</select>

		<select name="Reported_by">
			<option>Reported by</option>
			<?php
			$sqli = "SELECT DISTINCT Reported_by FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['Reported_by'] . '</option>';
			}
			?>
		</select>
		<select name="Falls_within">
			<option>Falls within by</option>
			<?php
			$sqli = "SELECT DISTINCT Falls_within FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['Falls_within'] . '</option>';
			}
			?>
		</select>
		<select name="Longitude">
			<option>Longitude</option>
			<?php
			$sqli = "SELECT DISTINCT Longitude FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['Longitude'] . '</option>';
			}
			?>
		</select>
		<select name="Latitude">
			<option>Latitude</option>
			<?php
			$sqli = "SELECT DISTINCT Latitude FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['Latitude'] . '</option>';
			}
			?>
		</select>
		<select name="Location">
			<option>Location</option>
			<?php
			$sqli = "SELECT DISTINCT Location FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['Location'] . '</option>';
			}
			?>
		</select>
		<select name="LSOA_Code">
			<option>LSOA Code</option>
			<?php
			$sqli = "SELECT DISTINCT LSOA_Code FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['LSOA_Code'] . '</option>';
			}
			?>
		</select>
		<select name="LSOA_Name">
			<option>LSOA Code</option>
			<?php
			$sqli = "SELECT DISTINCT LSOA_Name FROM west_crime_1";
			$result = mysqli_query($conn, $sqli);
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<option>' . $row['LSOA_Name'] . '</option>';
			}
			?>
		</select>
		<select name="last_outcome_category">
			<option>Last Outcome Category</option>
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
	<?php

	?>


	<div class="card shadow mb-5">
		<div class="card-header py-3">
			<h1 class="m-0 font-weight-bold text-success">Database Results</h1>
		</div>
		<div class="card-body">
			<div class="table-users" id="table-users">
				<div class="header">Crime</div>
				<table class="rwd-table" width="100%" cellspacing="0">

					<thead>
						<tr>
							<th>Reported_by</th>
							<th>Falls within</th>
							<th>Longitude</th>
							<th>Latitude</th>
							<th>Location</th>
							<th>LSOA code</th>
							<th>LSOA name</th>
							<th>Crime type</th>
							<th>Last outcome category</th>
						</tr>
					</thead>

					<?php
					// fetch data
					$sql = "SELECT * FROM west_crime_1;";
					$where = [];
					if (isset($_POST['Crime_type'])) {
						$crime = $conn->real_escape_string($_POST['Crime_type']);
						$where[] = "`Crime_type`=`" . $crime . "'";
					}
					if (isset($_POST['submit'])) {
						$Crime_type = $_POST['Crime_type'];
						$Reported_by = $_POST['Reported_by'];
						$Falls_within = $_POST['Falls_within'];
						$Longitude = $_POST['Longitude'];
						$Latitude = $_POST['Latitude'];
						$Location = $_POST['Location'];
						$LSOA_code = $_POST['LSOA_code'];
						$LSOA_name = $_POST['LSOA_name'];
						$last_outcome_category = $_POST['last_outcome_category'];
					}
					$where[] = "1";
					$sql .= "WHERE" . implode(" AND ", $where);
					$result = $conn->query($sql);


					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {

					?>

							<thead>
								<tr>
									<td><?php echo $row['Reported_by']; ?></td>
									<td><?php echo $row['Falls_within']; ?></td>
									<td><?php echo $row['Longitude']; ?></td>
									<td><?php echo $row['Latitude']; ?></td>
									<td><?php echo $row['Location']; ?></td>
									<td><?php echo $row['LSOA_code']; ?></td>
									<td><?php echo $row['LSOA_name']; ?></td>
									<td><?php echo $row['Crime_type']; ?></td>
									<td><?php echo $row['last_outcome_category']; ?></td>
								</tr>
							</thead>

					<?php

						}
					}
					?>




</body>

</html>