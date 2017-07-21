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
<div class="container bg-3 text-center radiusDiv liteBackground">
    <div class="container-fluid text-center">
        <h1>New Event</h1>
        <form enctype="multipart/form-data" name="formAddEvent" method="post" onsubmit="addEvent()" action="../script/eventAdder.php">
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" name="name" id="name" placeholder="Name" class="radiusDiv padding5 marginMin" required>
                </div>
                <div class="col-sm-4">
                    <input type="text" name="address" id="address" placeholder="Address" class="radiusDiv padding5 marginMin" required><br>
                </div>
                <div class="col-sm-4">
                    <input type="date" name="day" id="day" class="radiusDiv marginMin padding5" title="Day" required >
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-6">
                    <br>
                    <p>Description:</p>
                    <textarea cols="20" rows="5" name="description" id="description" class="radiusDiv marginMin padding5" title="Description" required>
                </textarea>
                </div>
                <div class="col-sm-6">
                    <img src="../media/camera.png" id="anteprima" name="anteprima" class="anteprima" >
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-6">.</div>
                <div class="col-sm-6 text-center">
                    <input type="file" id="image" name="image" class="align-center" required>
                </div>
            </div>
            <input name="owner" id="owner" type="text" hidden>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="radiusDiv marginMin"">
                        <img src="../media/plus.png">
                    </button>
                </div>
            </div>
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
