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
                      <!--<ul>
                <li>Utenti
                    <ul>
                        <li><a href="pageUsers.php">Utenti</a></li>
                        <li><a href="pageUpdateUser.php">ModUser</a></li>
                        <li><a href="pageDeleteUser.php">DeleteUser</a></li>
                        <li><a href="pageBanUser.php">BanUser</a></li>
                        <li><a href="pageAddAdmin.php">AddAdmin</a></li>
                   </ul>
               </li>
               <li>Eventi
                   <ul>
                       <li><a href="pageEvents.php"> Eventi</a></li>
                       <li><a href="pageDeleteEvent.php"> DeleteEvento</a></li>
                   </ul>
               </li>
           </ul>
            -->
       </div>
       <div class="col-sm-8 text-left">
           <h1>Area Amministrativa</h1>
           <hr>
           <p><b>STATISTICHE:</b></p>
           <div class="well">
               <?php require("script/showStats.php"); ?>
           </div>
       </div>


<?php
    require("shared/footer.php");
?>



