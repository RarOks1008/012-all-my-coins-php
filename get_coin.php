<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    include "connection.php";
    $upit = "SELECT c.id, value, country, year, emperor, weight, diameter, thickness, reference, certified, demonetized, comment, certified, observe_pic, observe_writing, p.id as picture_id, reverse_pic, reverse_writing, co.name as composition, s.name as shape, e.name as edge, g.name AS grade FROM coin c INNER JOIN composition AS co INNER JOIN shape AS s ON c.shape_id = s.id INNER JOIN edge AS e ON c.edge_id = e.id INNER JOIN grade g ON c.grade_id = g.id LEFT JOIN picture p ON c.pictures_id = p.id WHERE c.id = :id";
    $priprema = $connection -> prepare($upit);
    $priprema -> bindParam(":id", $_GET['id']);
    $rezultat = $priprema -> execute();
    if ($rezultat) {
        $coin = $priprema -> Fetch();
        echo json_encode($coin);
    } else {
        http_response_code(500);
    }
?>