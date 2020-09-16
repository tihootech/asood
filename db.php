<?php

    require_once('config.php');

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (mysqli_connect_errno()) {
        die( "<span style='color:red'>Connection failed </span>" .
        mysqli_connect_error() .
        " Error Number = " . mysqli_connect_errno()
        );
    }

    // $result = mysqli_query($conn, $query);
    // while ( $subject = mysqli_fetch_assoc($result) ) {
    //     echo "<li>{$subject['menu_name']}</li>";
    // }
?>
