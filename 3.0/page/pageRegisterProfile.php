<?php
    //require("shared/accessManager.php");
    require("shared/header.php");
    /*if(!isset($logged)||!$logged)
        header("Location: pageHomepage.php");*/
?>

    <div class="container radiusDiv liteBackground">
        <h1 class="text-center">Profile</h1>
        <form name="profile-form" onsubmit="return checkProfile()" method="post" action="script/checkProfile.php">
            <div class="row">
                <div class="col-sm-3 text-right">
                    <input type="text" name="nome" id="nome" placeholder="Nome" class="radiusDiv padding5"><br/><br/>
                    <input type="email" name="email1" id="email1" placeholder="Mail" class="radiusDiv padding5" required><br><br/>
                    <input type="email" name="email2" id="email2" placeholder="Repeat Mail" class="radiusDiv padding5" required>
                </div>
                <div class="col-sm-3 text-right">
                    <input type="text" name="cognome" id="cognome" placeholder="Cognome" class="radiusDiv padding5"><br><br/>
                    <input type="text" name="residenza" id="residenza" placeholder="Residenza" class="radiusDiv padding5"><br><br/>
                    <input type="url" name="link_social" id="link_social" placeholder="Link_Social" class="radiusDiv padding5">
                </div>
                <div class="col-sm-6 text-right">
                    <textarea cols="50" rows="6" name="auto_descrizione" id="auto_descrizione" placeholder="Descrizione" class="radiusDiv padding5" required></textarea>
                </div>
            </div>
            <div class="row text-center marginMin">
                <div class="col-sm-12">
                    <button type="submit" class="radiusDiv">
                        Submit
                    </button>
                </div>
            </div>
        </form>
        <hr><h4 id="formError"></h4>
        <?php
        if(!empty($_GET["message"])) {
            echo "<h5>".$_GET["message"]."</h5>";
        }
        ?>
    </div>

<?php //require("shared/footer.php"); ?>