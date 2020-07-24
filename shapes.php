<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    include "connection.php";
    $upit = "SELECT id, name FROM shape ORDER BY id ASC";
    $priprema = $connection -> prepare($upit);
    $rezultat = $priprema -> execute();
    if ($rezultat) {
        $shapes = $priprema -> FetchAll();
        echo json_encode($shapes);
    } else {
        http_response_code(500);
    }
?>