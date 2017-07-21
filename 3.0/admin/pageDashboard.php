
<?php
    //TODO inserire controllo sessione
    require("header.php");
    require("navbar.php");
?>
<div class="container-fluid text-left">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <ul>
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

       </div>
       <div class="col-sm-8 text-left">
           <h1>Area Amministrativa</h1>
           <p> TESTO DA INSERIRE</p> <!--TODO inserire descrizione delle funzionalità dell'area amministrativa-->
           <hr>
           <p>INSERIRE STATISTICHE</p><!--TODO inserire dei dati statistici (grafici?) del sistema-->
       </div>
       <div class="col-sm-2 sidenav">
           <div class="well">
               <p>ADS</p><!--TODO utente più attivo-->
           </div>
           <div class="well">
               <p>ADS</p><!--TODO evento più seguito-->
           </div>
           <!--TODO se vogliamo altro-->
       </div>
   </div>

    <?php require("footer.php"); ?>



