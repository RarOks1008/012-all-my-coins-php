<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    include "connection.php";
    $upit = "SELECT id, name FROM composition ORDER BY id ASC";
    $priprema = $connection -> prepare($upit);
    $rezultat = $priprema -> execute();
    if ($rezultat) {
        $compositions = $priprema -> FetchAll();
        echo json_encode($compositions);
    } else {
        http_response_code(500);
    }
?>