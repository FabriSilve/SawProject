<?php
    //require("shared/accessManager.php");
    require("shared/header.php");
    /*if(!isset($logged)||!$logged)
        header("Location: pageHomepage.php");*/
?>

    <div class="container radiusDiv liteBackground">
        <h1 class="text-center">Profile</h1>
        <form name="profile-form" onsubmit="return checkProfile();" method="post" action="script/checkProfile.php">
            <div class="row">
                <div class="col-sm-3 text-right">
                    <input type="text" name="name" id="name" placeholder="Nome" class="radiusDiv padding5"><br/><br/>
                    <input type="email" name="email1" id="email1" placeholder="Mail" class="radiusDiv padding5" required><br><br/>
                    <input type="email" name="email2" id="email2" placeholder="Ripeti Mail" class="radiusDiv padding5" required>
                </div>
                <div class="col-sm-3 text-right">
                    <input type="text" name="surname" id="surname" placeholder="Cognome" class="radiusDiv padding5"><br><br/>
                    <input type="text" name="residence" id="residence" placeholder="Residenza" class="radiusDiv padding5"><br><br/>
                    <input type="url" name="link" id="link" placeholder="Link Social" class="radiusDiv padding5">
                </div>
                <div class="col-sm-6 text-right">
                    <textarea cols="50" rows="6" name="description" id="description" placeholder="Descrizione" class="radiusDiv padding5"></textarea>
                </div>
            </div>
            <div class="row text-center marginMin">
                <div class="col-sm-12">
                    <button type="submit" class="radiusDiv">
                        salva
                    </button>
                </div>
            </div>
        </form>
        <hr><h4 id="error" class="text-center"></h4>
        <?php
        if(!empty($_GET["message"])) {
            echo '<h5 class="text-center">'.$_GET["message"].'</h5>';
        }
        ?>
    </div>

<?php //require("shared/footer.php"); ?>