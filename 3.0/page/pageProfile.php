<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    if(!isset($logged)||!$logged)
        header("Location: pageHomepage.php");
?>

    <div class="container container-table">
        <div class="row vertical-center-row marginMin">
            <div class="text-center col-md-4 col-md-offset-4 radiusDiv liteBackground">
                <h1>Profile</h1>
                <form name="profile-form" onsubmit="return checkReg()" method="post" action="script/checkProfile.php">
                    <p>
                        <input type="text" name="nome" id="nome" placeholder="Nome" class="radiusDiv padding5" required>
                    </p>
                    <p>
                        <input type="text" name="cognome" id="cognome" placeholder="Cognome" class="radiusDiv padding5" required>
                    </p>
                    <p>
                        <input type="email" name="email1" id="email1" placeholder="Mail" class="radiusDiv padding5" required>
                    </p>
                    <p>
                        <input type="email" name="email2" id="email2" placeholder="Repeat Mail" class="radiusDiv padding5" required>
                    </p>
                    <p>
                        <input type="text" name="residenza" id="residenza" placeholder="Residenza" class="radiusDiv padding5" required>
                    </p>
                    <p>
                        <input type="url" name="link_social" id="link_social" placeholder="Link_Social" class="radiusDiv padding5" required>
                    </p>
                    <p>
                        <textarea cols="50" rows="10" name="auto_descrizione" id="auto_descrizione" placeholder="Auto_Descrizione" class="radiusDiv padding5" required></textarea>
                    </p>
                    <br>
                    <p>
                        <button type="submit" class="radiusDiv">
                            Submit
                        </button>
                    </p>
                </form>
                <hr><h4 id="formError"></h4>
                <?php
                if(!empty($_GET["profileError"])) {
                    if($_GET["profileError"] == "k")
                        echo "<h5> Si è verificato un errore, riprova. </h5>";
                    else
                        echo htmlspecialchars($_GET["profileError"]);
                }
                ?>
            </div>
        </div>
    </div>

<?php //require("shared/footer.php"); ?>