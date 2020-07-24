<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    include "connection.php";
    $coinId = $_GET['id'];
    $picId = 0;
    $upic_pic_ic = "SELECT pictures_id FROM coin WHERE id = :id";
    $priprema_pic_ic = $connection -> prepare($upic_pic_ic);
    $priprema_pic_ic -> bindParam(":id", $coinId);
    $rezultat_pic_ic = $priprema_pic_ic -> execute();
    if ($rezultat_pic_ic) {
        $parica = $priprema_pic_ic->Fetch();
        if ($parica) {
            $picId = $parica->pictures_id;
        }
    }
    if ($picId) {
        $query = "DELETE FROM picture WHERE id = :id";
        $priprema = $connection -> prepare($query);
        $priprema->bindParam(":id", $picId);
        $priprema->execute();
    }
    $query2 = "DELETE FROM coin WHERE id = :id";
    $priprema2 = $connection -> prepare($query2);
    $priprema2->bindParam(":id", $coinId);
    $rezultat2 = $priprema2->execute();
    echo json_encode("OK");
?>
