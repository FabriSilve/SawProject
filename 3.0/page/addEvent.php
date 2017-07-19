<?php
    require("accessManager.php");
    require("header.php");
    //require("navbar.php");
    if(!isset($logged)||!$logged)
        header("Location: homepage.php");
?>

<div class="container text-center liteOrange">
    <h1>Add Event</h1>
    <h3>What's New?</h3>
</div>
<br>
<div class="container bg-3 text-center radiusDiv liteBackground">
    <div class="container-fluid text-center">
        <h1>New Event</h1>
        <div class="row">
            <div class="col-sm-4">
                <input type="text" name="name" id="name" placeholder="Name" class="radiusDiv padding5 margin5" required>
            </div>
            <div class="col-sm-4">
                <input type="text" name="address" id="address" placeholder="Address" class="radiusDiv padding5 margin5" required><br>
            </div>
            <div class="col-sm-4">
                <input type="date" name="day" id="day" class="radiusDiv margin5 padding5" required>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-6">
                <br>
                <p>Description:</p>
                <textarea rows="8" name="description" id="description" class="radiusDiv margin5"  required>
            </textarea>
            </div>
            <div class="col-sm-6">
                <img src="../media/camera.png" id="anteprima" name="anteprima" class="anteprima" >
            </div>
        </div>
        <div class="row text-center">
            <div class="col-sm-6"></div>
            <div class="col-sm-6">
                <input type="file" id="image" name="image" required>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button class="radiusDiv margin5" onclick="addEvent()">
                    <img src="../media/plus.png">
                </button>
            </div>
        </div>
        <div id="addMessage" class="row">
        </div>
    </div>
</div>
<br>

<?php
    require("footer.php");
?>
