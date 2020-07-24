<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    include "connection.php";
    $upit = "SELECT id, name FROM grade ORDER BY id ASC";
    $priprema = $connection -> prepare($upit);
    $rezultat = $priprema -> execute();
    if ($rezultat) {
        $grades = $priprema -> FetchAll();
        echo json_encode($grades);
    } else {
        http_response_code(500);
    }
?>