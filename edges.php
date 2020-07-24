<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
    include "connection.php";
    $upit = "SELECT id, name FROM edge ORDER BY id ASC";
    $priprema = $connection -> prepare($upit);
    $rezultat = $priprema -> execute();
	if ($rezultat) {
		$edges = $priprema -> FetchAll();
		echo json_encode($edges);
    } else {
		http_response_code(500);
    }
?>
