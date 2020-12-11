<?php
include 'conn.php';
echo $_POST["fname"];
echo $_POST["lname"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
echo ("Inserting a new row into table" . PHP_EOL);
$tsql= "INSERT INTO [dbo].[Student] (FName, LName) VALUES (?,?);";

$params = array($fname,$lname);
if($conn)
        echo "Connected!";
$getResults= sqlsrv_query($conn, $tsql,$params);
echo $getResults;
$rowsAffected = sqlsrv_rows_affected($getResults);
if ($getResults == FALSE or $rowsAffected == FALSE)
    die(FormatErrors(sqlsrv_errors()));
echo ($rowsAffected. " row(s) inserted: " . PHP_EOL);

sqlsrv_free_stmt($getResults);

?>