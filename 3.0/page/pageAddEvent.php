<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    if(!isset($logged)||!$logged)
        header("Location: pageHomepage.php");
?>

<div class="container text-center liteOrange borderRadius">
    <h1>Add Event</h1>
    <h3>What's New <?php echo $username; ?>?</h3>
</div>
<br>

    <div class="container text-center borderRadius liteBackground">
        <h1>New Event</h1>
        <form enctype="multipart/form-data" name="formAddEvent" method="post" onsubmit="checkAddEvent()" action="script/eventAdder.php">
            <div class="row">
                <div class="col-sm-4 ">
                    <input name="name" id="name" placeholder="Name" class="borderRadius padding5 marginMin" required>
                    <input name="address" id="address" placeholder="Address" class="borderRadius padding5 marginMin" required><br>
                    <input type="date" name="day" id="day" class="borderRadius marginMin padding5" title="Day" required >
                </div>
                <div class="col-sm-4">
                    <textarea cols="25" rows="5" name="description" id="description" class="borderRadius padding5" placeholder="Description" required></textarea>
                </div>
                <div class="col-sm-4">
                    <input type="file" id="image" name="image" value="Select a photo" placeholder="Select a photo" required>
                 </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <button class="borderRadius">
                        <img src="../media/plus.png" alt="add event">
                    </button>
                </div>
            </div>
        </form>
        <?php
            if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                echo '<h5 class="error">'.$_GET["message"].'</h5>';
            }
        ?>
        <div id="error" class="error"></div>
    </div>

<br>

<?php
    require("shared/footer.php");
?>
