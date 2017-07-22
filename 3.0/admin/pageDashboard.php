
<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    require("shared/navbar.php");
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
            <p> TESTO DA INSERIRE</p> <!--TODO inserire descrizione delle funzionalità dell'area amministrativa--><hr>
            <p>Lorem ipsum...</p><!--TODO inserire dei dati statistici (grafici?) del sistema-->
        </div>
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p>ADS</p><!--TODO se vogliamo altro-->
            </div>
            <div class="well">
                <p><a href="calendar.php"> Calendar</a><!--TODO evento più seguito  Vera: Ho messo calendar--></p>
            </div>
        </div>
    </div>
</div>
<?php
    require("shared/footer.php");
?>



