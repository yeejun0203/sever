<html>
<head>
	<title>MySQL Setup Test</title>
</head>	
<body>

<?php

$submitted = 'no';
$user = '';
$password = '';
$host = '';
$port = '';
$server = '';
$database = '';
$query = "CALL GetAllNames()";

if ($_POST)
{
	if (isset($_POST['user']))
	{
		$submitted = 'yes';
		$user = $_POST['user'];
		$password = $_POST['password'];
		$host = $_POST['host'];
		$port = $_POST['port'];
		$server = $host . ':' . $port;
		$database = $_POST['database'];
	}
}

?>

	<p>
		Enter the parameters below and hit submit. 
	</p>
	<p> 
		An attempt will be made to access the database and display the results of<br>
		the Show Databases query.
	</p>	
		
	<form name="f" method="POST">
		<table>
			<tr>
				<td>User:</td>
				<td><input type="text" name="user" value="<?php echo $user; ?>"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="text" name="password" value="<?php echo $password; ?>"></td>
			</tr>
			<tr>
				<td>Host (localhost):</td>
				<td><input type="text" name="host" value="<?php echo $host; ?>"></td>
			</tr>
			<tr>
				<td>Port (3306):</td>
				<td><input type="text" name="port" value="<?php echo $port; ?>"></td>
			</tr>
			<tr>
				<td>Database Name:</td>
				<td><input type="text" name="database" value="<?php echo $database; ?>"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>

<?php

if ($submitted == 'yes')
{
	$mysqli = new mysqli ($server, $user, $password);
	if(!$mysqli) die('Could not connect: ' . mysql_error());
	if ($mysqli->connect_erno)
	{
		die('ERROR: Could not connect: ' . mysql_error());
	}
	
	mysqli_select_db($mysqli, $database);
	
	echo "test";
	
	mysqli_close($mysqli); 
}

?>

</body>
</html>