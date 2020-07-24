<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    include "connection.php";

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $observe_image_name = '';
    $reverse_image_name = '';
    $observe_write = !empty($request->coinObserveWriting) ? $request->coinObserveWriting : '';
    $reverse_write = !empty($request->coinReverseWriting) ? $request->coinReverseWriting : '';
    $lastPicId = null;
    $coinEmperor = !empty($request->coinEmperor) ? $request->coinEmperor : '';
    $coinEdge = !empty($request->coinEdge) ? $request->coinEdge : '';
    $coinComposition = !empty($request->coinComposition) ? $request->coinComposition : '';
    $coinWeight = !empty($request->coinWeight) ? $request->coinWeight : '';
    $coinDiameter = !empty($request->coinDiameter) ? $request->coinDiameter : '';
    $coinThickness = !empty($request->coinThickness) ? $request->coinThickness : '';
    $coinReference = !empty($request->coinReference) ? $request->coinReference : '';
    $coinDemonetized = !empty($request->coinDemonetized) ? $request->coinDemonetized : '';
    $coinYear = !empty($request->coinYear) ? $request->coinYear : 0;
    $coinComment = !empty($request->coinComment) ? $request->coinComment : '';
    $coinCertification = !empty($request->coinCertified) ? (!empty($request->coinCertification) ? $request->coinCertification : 'No') : 'No';
    $coinGetId = $_GET['id'];
    $coinPicId = 0;
    $upic_pic_ic = "SELECT pictures_id FROM coin WHERE id = :id";
    $priprema_pic_ic = $connection -> prepare($upic_pic_ic);
    $priprema_pic_ic -> bindParam(":id", $coinGetId);
    $rezultat_pic_ic = $priprema_pic_ic -> execute();
    if ($rezultat_pic_ic) {
        $parica = $priprema_pic_ic->Fetch();
        $coinPicId = $parica->pictures_id;
    }
    if ($request->coinValue && $request->coinCountry && $request->coinShape && $request->coinGrade) {
        if ($request->coinObservePic) {
            $observeImage = $request->coinObservePic;
            $observeImage = substr(explode(";",$observeImage)[1], 7);
            $observe_image_name = time().'o.png';
            file_put_contents('coin-images/'.$observe_image_name, base64_decode($observeImage));
        }
        if ($request->coinReversePic) {
            $reverse_image = $request->coinReversePic;
            $reverse_image = substr(explode(";", $reverse_image)[1], 7);
            $reverse_image_name = time() . 'r.png';
            file_put_contents('coin-images/' . $reverse_image_name, base64_decode($reverse_image));
        }
        if (($request->coinObservePic || $request->coinReversePic) && !$coinPicId) {
            $upit_img = "INSERT INTO picture (observe_pic, observe_writing, reverse_pic, reverse_writing) VALUES (:img, :write, :imgg, :writee)";
            $priprema_img = $connection -> prepare($upit_img);
            $priprema_img -> bindParam(":img", $observe_image_name);
            $priprema_img -> bindParam(":write", $observe_write);
            $priprema_img -> bindParam(":imgg", $reverse_image_name);
            $priprema_img -> bindParam(":writee", $reverse_write);
            $priprema_img -> execute();
            $lastPicId = $connection->lastInsertId();

            $upi3 = "UPDATE coin SET pictures_id = :pictures_id WHERE id = :id";
            $priprema = $connection -> prepare($upi3);
            $priprema->bindParam(":pictures_id", $lastPicId);
            $priprema->bindParam(":id", $coinGetId);
            $priprema -> execute();
        } else {
            if ($request->coinObservePic) {
                $query1 = "UPDATE picture SET observe_pic = :observe_pic WHERE id = :id";
                $priprema = $connection -> prepare($query1);
                $priprema->bindParam(":observe_pic", $observe_image_name);
                $priprema->bindParam(":id", $coinPicId);
                $priprema -> execute();
            }
            if ($request->coinReversePic) {
                $query2 = "UPDATE picture SET reverse_pic = :reverse_pic WHERE id = :id";
                $priprema = $connection -> prepare($query2);
                $priprema->bindParam(":reverse_pic", $reverse_image_name);
                $priprema->bindParam(":id", $coinPicId);
                $priprema -> execute();
            }
            $query3 = "UPDATE picture SET observe_writing = :observe_writing, reverse_writing = :reverse_writing WHERE id = :id";
            $priprema = $connection -> prepare($query3);
            $priprema->bindParam(":observe_writing", $observe_write);
            $priprema->bindParam(":reverse_writing", $reverse_write);
            $priprema->bindParam(":id", $coinPicId);
            $priprema -> execute();
        }
        $upit_coin = "UPDATE coin SET value = :value, year = :year, country = :country, emperor = :emperor, shape_id = :shape_id, grade_id = :grade_id, edge_id = :edge_id, composition_id = :composition_id, weight = :weight, diameter = :diameter, thickness = :thickness, reference = :reference, certified = :certified, demonetized = :demonetized, comment = :comment WHERE id = :id";
        $priprema_coin = $connection -> prepare($upit_coin);
        $priprema_coin -> bindParam(":value", $request->coinValue);
        $priprema_coin -> bindParam(":year", $coinYear);
        $priprema_coin -> bindParam(":country", $request->coinCountry);
        $priprema_coin -> bindParam(":emperor", $coinEmperor);
        $priprema_coin -> bindParam(":shape_id", $request->coinShape);
        $priprema_coin -> bindParam(":grade_id", $request->coinGrade);
        $priprema_coin -> bindParam(":edge_id", $coinEdge);
        $priprema_coin -> bindParam(":composition_id", $coinComposition);
        $priprema_coin -> bindParam(":weight", $coinWeight);
        $priprema_coin -> bindParam(":diameter", $coinDiameter);
        $priprema_coin -> bindParam(":thickness", $coinThickness);
        $priprema_coin -> bindParam(":reference", $coinReference);
        $priprema_coin -> bindParam(":certified", $coinCertification);
        $priprema_coin -> bindParam(":demonetized", $coinDemonetized);
        $priprema_coin -> bindParam(":comment", $coinComment);
        $priprema_coin -> bindParam(":id", $coinGetId);
        $priprema_coin -> execute();
        echo json_encode("OK");
    } else {
        echo json_encode("NOK");
    }
?>