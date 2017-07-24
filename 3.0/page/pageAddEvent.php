<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    if(!isset($logged)||!$logged)
        header("Location: pageHomepage.php");
?>

<div class="container text-center liteOrange radiusDiv">
    <h1>Add Event</h1>
    <h3>What's New?</h3>
</div>
<br>
<div class="container bg-3 radiusDiv liteBackground">
    <div class="container-fluid text-center">
        <h1>New Event</h1>
        <form enctype="multipart/form-data" name="formAddEvent" method="post" onsubmit="addEvent()" action="script/eventAdder.php">
            <div class="row">
                <div class="col-sm-4 ">
                    <input type="text" name="name" id="name" placeholder="Name" class="radiusDiv padding5 marginMin" required>
                    <input type="text" name="address" id="address" placeholder="Address" class="radiusDiv padding5 marginMin" required><br>
                    <input type="date" name="day" id="day" class="radiusDiv marginMin padding5" title="Day" required >
                    <input name="owner" id="owner" value="owner" type="text" hidden>
                </div>
                <div class="col-sm-4">
                    <h5>Description:</h5>
                    <textarea cols="25" rows="5" name="description" id="description" class="radiusDiv" title="Description" required>
                    </textarea>
                    <!--<div class="col-sm-6">
                        <img src="../media/camera.png" id="anteprima" name="anteprima" class="anteprima" >
                    </div>-->
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="radiusDiv">
                        <img src="../media/plus.png">
                    </button>
                    <!--TODO chiedere permessi alla prof
                     <p><input type="file" id="image" name="image" required></p>-->
                 </div>
            </div>
            <!--<div class="row">
                <div class="col-sm-12 text-center">

                </div>
            </div>-->
        </form>
        <?php if(isset($_GET["addError"]) && $_GET["addError"] !== "" ) {
            echo '<h5>'.$_GET["addError"].'</h5>';
        }
        ?>
    </div>
</div>
<br>

<?php
    require("shared/footer.php");
?>
