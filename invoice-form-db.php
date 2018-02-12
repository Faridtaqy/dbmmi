<?php
//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'dbmmi1');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Invoice Generator</title>
</head>
<body>
	select invoice :
	<form method="get" action="invoice-db.php">
		<select name="client_id">
			<?php
				//show invoices list as options
				$query = mysqli_query($con,'select * from mmi_client');
				while ($mmi_client = mysqli_fetch_arr($query)) {
					echo "<option value='".$mmi_client['client_id']."'>".$mmi_client['client_id']."</option>";
				}
			?>
			</select>
			<input type="submit" name="Generate">
		</form>
	</body>
</html>