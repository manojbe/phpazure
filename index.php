<html>
<h1> 
Test Manoj website, reading data from Azure SQL server Database
	
Test Manoj website, reading data from Azure SQL server Database services
</h1>

<?php
include 'conn.php';
	/*
    $serverName = "mk-sqlserver.database.windows.net";
    $connectionOptions = array(
        "Database" => "mk-db1",
        "Uid" => "mkadmin",
        "PWD" => "Dec@2020"
    );
	
	
    $serverName = "DESKTOP-HTCQQD0";
    $connectionOptions = array(
        "Database" => "testdb",
		  "Uid" => "mkuser1",
        "PWD" => "manoj1234"

    );
	*/
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn)
        echo "Connected!";
	if($conn)
	{
		$tsql = "SELECT  [ID],[FName],[LName],[dob] FROM [dbo].[Student]";
		$getResults= sqlsrv_query($conn, $tsql,array(), array( "Scrollable" => 'static' ));
		echo ("Reading data from table". PHP_EOL );
		echo "<br>";
		if ($getResults == FALSE)
			die(FormatErrors(sqlsrv_errors()));
		$row_count = sqlsrv_num_rows( $getResults );
		echo "<h2> Number of row fetched : " .$row_count ."</h2>";
		echo "<table border=2 style='width:50%'";
		echo "<tr><th style='height:100px'>ID</th>";
		echo "<th style='height:100px'>First Name</th>";
		echo "<th style='height:100px'>Last Name</th></tr>";


		while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC )) 
		{
			echo "<tr>";
			echo "<td>" .$row['ID']. "</td>";
			echo "<td>" .$row['FName']. "</td>";
			echo "<td>" .$row['LName']. "</td>";
			/*echo ($row['ID'] . " " . $row['FName'] . " " . $row['LName'] );*/
			
		}
		echo "</table>";
		sqlsrv_free_stmt($getResults);
	}
function FormatErrors( $errors )
{
    /* Display errors. */
    echo "Error information: ";

    foreach ( $errors as $error )
    {
        echo "SQLSTATE: ".$error['SQLSTATE']."";
        echo "Code: ".$error['code']."";
        echo "Message: ".$error['message']."";
    }
}
?>
<form action='insert.php' method="post">
First Name: <input type="text" name="fname"><br>
Last Name: <input type="text" name="lname"><br>
<input type="submit" name="submit" value="Submit">
</form>
</html>
