<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    include "connection.php";
    $upit = "SELECT COUNT(id) AS number FROM coin";
    $priprema = $connection -> prepare($upit);
    $rezultat = $priprema -> execute();
    if ($rezultat) {
        $number = $priprema -> Fetch();
        echo json_encode($number);
    } else {
        http_response_code(500);
    }
?>