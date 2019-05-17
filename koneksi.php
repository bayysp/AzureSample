<?php
    $host = "bayywebappserver.database.windows.net";
    $user = "dicoding";
    $pass = "belajar123!";
    $db = "dicoding";
    try {
        $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    } catch(Exception $e) {
        echo "Failed: " . $e;
    }
?>