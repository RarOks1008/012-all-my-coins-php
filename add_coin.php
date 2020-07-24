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

    if ($request->coinValue && $request->coinCountry && $request->coinShape && $request->coinGrade) {
        if ($request->coinObservePic) {
            $observeImage = $request->coinObservePic;
            $observeImage = substr(explode(";",$observeImage)[1], 7);
            $observe_image_name = time().'o.png';
            file_put_contents('coin-images/'.$observe_image_name, base64_decode($observeImage));
        }
        if ($request->coinReversePic) {
            $reverse_image = $request->coinReversePic;
            $reverse_image = substr(explode(";",$reverse_image)[1], 7);
            $reverse_image_name = time().'r.png';
            file_put_contents('coin-images/'.$reverse_image_name, base64_decode($reverse_image));
        }
        if ($request->coinObservePic || $request->coinReversePic) {
            $upit_img = "INSERT INTO picture (observe_pic, observe_writing, reverse_pic, reverse_writing) VALUES (:img, :write, :imgg, :writee)";
            $priprema_img = $connection -> prepare($upit_img);
            $priprema_img -> bindParam(":img", $observe_image_name);
            $priprema_img -> bindParam(":write", $observe_write);
            $priprema_img -> bindParam(":imgg", $reverse_image_name);
            $priprema_img -> bindParam(":writee", $reverse_write);
            $priprema_img -> execute();
            $lastPicId = $connection->lastInsertId();
        }
        $upit_coin = "INSERT INTO coin (value, pictures_id, year, country, emperor, shape_id, grade_id, edge_id, composition_id, weight, diameter, thickness, reference, certified, demonetized, comment) VALUES (:value, :pictures_id, :year, :country, :emperor, :shape_id, :grade_id, :edge_id, :composition_id, :weight, :diameter, :thickness, :reference, :certified, :demonetized, :comment)";
        $priprema_coin = $connection -> prepare($upit_coin);
        $priprema_coin -> bindParam(":value", $request->coinValue);
        $priprema_coin -> bindParam(":pictures_id", $lastPicId);
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
        $priprema_coin -> execute();
        echo json_encode("OK");
    } else {
        echo json_encode("NOK");
    }
?>