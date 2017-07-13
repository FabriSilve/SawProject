<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 23/05/2017
 * Time: 16:13
 */
    require("coockieSessionChecker.php");
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Event Around</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--<script src="http://maps.google.com/maps/api/js?key=AIzaSyAQO1FBU7ngY0Wv20d3-gPI1sj5_ApCZ3M&sensor=true"></script>-->

    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            padding: 25px;
        }

        .jumbotron {
            padding: 0;
        }

        body {
            background: url(../media/background.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .liteBackground {
            background-color: rgba(225, 225, 225, 0.8);
            padding: 15px 15px 15px 15px;
        }

        .liteOrange {
            background-color: rgba(255, 154, 0, 0.9);
        }

        .radiusDiv {
            border-radius: 20px;
            -moz-border-radius: 20px;
            -webkit-border-radius: 20px;
        }

        .margin5 {
            margin: 5%;
        }

        .marginBottom {
            margin-bottom: 20px;
        }

        .link {
            color: #FF8100;
            font-weight: bold;
        }

        h1 {
            color: #FF8100;
            text-shadow: 4px 2px 4px #B2B2B2;
            font-weight: bold;
        }

        h2 {
            color: #FF8100;
            text-shadow: 4px 2px 4px #B2B2B2;
            font-weight: bold;
        }

        .padding5 {
            padding-left: 5px;
        }

        .leftAlign {
            text-align: left;
        }

        .menu{
            width: 350;
            margin: 0;
            border: 0 none;
            padding: 0;
            list-style: none;
            background: #FF8100;
            height: 30px;
            font: bold 12px/28px Verdana, Arial;
            border-left: #FF8100 1px solid;
            display: inline;
        }


    </style>

    <script>
        function checkLogin() {
            alert("check login");
            if(document.getElementById("loginUsername").value === "") {
                document.getElementById("loginUsername").focus();
                return false;
            }
            if(document.getElementById("loginPassword").value === "") {
                document.getElementById("loginPassword").focus();
                return false;
            }
            return true;
        }

        function checkReg() {
            alert("check reg");
            //non funziona 2.0 mail valida
            var pattern = new RegExp("[^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$]]");

            if(document.getElementById("username").value === "") {
                document.getElementById("username").focus();
                return false;
            }
            if(document.getElementById("mail1").value === "" ) {
                document.getElementById("mail1").focus();
                return false;
            }
            if(document.getElementById("mail2").value === "" || document.getElementById("mail1").value !== document.getElementById("mail2").value) {
                document.getElementById("mail2").focus();
                return false;
            }
            if(document.getElementById("password1").value === "") {
                document.getElementById("password1").focus();
                return false;
            }

            if(document.getElementById("password2").value === "" || document.getElementById("password1").value !== document.getElementById("password2").value) {
                document.getElementById("password2").focus();
                return false;
            }
            return true;
        }

        function showValue(id, newValue)
        {
            document.getElementById(id).innerHTML=newValue+" ";
        }

        function checkSearch() {
            alert("check search");
            var geocoder = new google.maps.Geocoder();
            var address = document.getElementById("position").value;
            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status === 'OK') {
                    showMap(results[0].geometry.location);
                    /*var marker = new google.maps.Marker({
                        map: map,
                    position: results[0].geometry.location*/
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });

        }

        function codeAddress(address) {
            geocoder.geocode( { 'address': address}, function(results, status){
                if(status === google.maps.GeocoderStatus.OK){
                    map.setCenter(results[0].geometry.location);
                    marker.setPosition(results[0].geometry.location);
                    lat =  results[0].geometry.location.lat();
                    lon = results[0].geometry.location.lng();
                }else{
                    alert("Geocode ha rilevato questo errore: " + status);
                }
            });
        }

        var hider = true;
        function showFilter() {
            if(hider) {
                document.getElementById("filter").style.display = "block";
                hider = false;
            } else {
                document.getElementById("filter").style.display = "none";
                hider = true;
            }
        }
    </script>

</head>
<body>

