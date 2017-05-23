<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 20/05/2017
 * Time: 09:49
 */

    function getCoordinates($address){

        $address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern

        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";

        $response = file_get_contents($url);

        $json = json_decode($response,TRUE); //generate array object from the response from the web

        return ($json['results'][0]['geometry']['location']['lat'].",".$json['results'][0]['geometry']['location']['lng']);

    }

    $useCity = true;
    //INSERIRE VALIDAZIONE E CONTROLLO INPUT
    if(isset($_POST['position']) && $_POST['position'] != '') {
        $city = $_POST['position'];
        echo "city: ".$city."<br/>";
    } else {
        if(isset($_POST['lat']) and isset($_POST['lon'])) {
            $lat = $_POST['lat'];
            $lon = $_POST['lon'];
            echo "cordinate: ".$lat.";".$lon."<br/>";
            $useCity = false;
        } else {
            $city = "Genova";
        }
    }



    if(isset($_POST['distance'])) {
        $distance = $_POST['distance'];
        echo "distanza: ".$distance."<br/>";
    }
    $i = 0;
    if(isset($_POST['party'])) {
        if($_POST['party'] == 1) {
            $type[$i++] = "party"."<br/>";
        }
    }
    if(isset($_POST['show'])) {
        if($_POST['show'] == 1) {
            $type[$i++] = "show";
        }
    }
    if(isset($_POST['art'])) {
        if($_POST['art'] == 1) {
            $type[$i++] = "art";
        }
    }
    if(isset($_POST['sport'])) {
        if($_POST['sport'] == 1) {
            $type[$i++] = "sport";
        }
    }

    foreach ($type as $t) {
        echo "type: " . $t."<br/>";
    }



?>