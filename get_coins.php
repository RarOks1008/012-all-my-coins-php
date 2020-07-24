<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    include "connection.php";
    $upit = "SELECT c.id, value, country, year, g.name AS grade, certified, observe_pic, observe_writing, reverse_pic, reverse_writing FROM coin c INNER JOIN grade g ON c.grade_id = g.id LEFT JOIN picture p ON c.pictures_id = p.id WHERE 1=1";
    if ($_GET["cert"] == "true") {
        $upit = $upit . " AND certified NOT LIKE 'No'";
    }
    if ($_GET["pic"] == "true") {
        $upit = $upit . " AND pictures_id IS NOT NULL";
    }
    if ($_GET["dem"] == "true") {
        $upit = $upit . " AND demonetized = 1";
    }
    if (trim($_GET["srtx"]) != "") {
        $upit = $upit . " AND (value LIKE '%".trim($_GET["srtx"])."%' OR year LIKE '%".trim($_GET["srtx"])."%' OR country LIKE '%".trim($_GET["srtx"])."%')";
    }
    $orderBy = $_GET["order"];
    $orderByQuery = $orderBy == "order-up" ? "c.id ASC" : ($orderBy == "year-up" ? "year ASC" : ($orderBy == "year-down" ? "year DESC" : "c.id DESC"));
    $upit = $upit . " ORDER BY " . $orderByQuery;
    $priprema = $connection -> prepare($upit);
    $rezultat = $priprema -> execute();
    if ($rezultat) {
        $coins = $priprema -> FetchAll();
        echo json_encode($coins);
    } else {
        http_response_code(500);
    }
?>