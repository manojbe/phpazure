<?php
	/*
    $serverName = "mk-sqlserver.database.windows.net";
    $connectionOptions = array(
        "Database" => "mk-db1",
        "Uid" => "mkadmin",
        "PWD" => "Dec@2020"
    );
	
	*/
    $serverName = "DESKTOP-HTCQQD0";
    $connectionOptions = array(
        "Database" => "testdb",


    );
	
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
?>