<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    require("shared/navbar.php");
?>

<div class="container-fluid text-left trasparentBackground">
    <div class="row content">
        <div class="col-sm-2 sidenav">
                <div class="well">
                    <div class="chip">
                        <img src="../media/img_avatar.png" alt="Person" width="50" height="50">
                        Admin
                    </div>
                </div>
        </div>
       <div class="col-sm-8 text-left">
           <h1>Area Amministrativa</h1>
           <hr>
           <p><b>STATISTICHE:</b></p>
           <div class="well">
               <?php require("script/showStats.php"); ?>
           </div>
       </div>
    </div>
</div>


<?php
    require("shared/footer.php");
?>



