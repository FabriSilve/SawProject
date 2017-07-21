
<?php
/**
 * Created by PhpStorm.
 * User: vera
 * Date: 03/06/17
 * Time: 8.53
 */
require("header.php");
?>

<!DOCTYPE html>
<html lang="it">

<head>
</head>

<body>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <ul>
                <li>Utenti
                    <ul>
                        <li><a href="mostraUtenti.php">Utenti</a></li>
                        <li><a href="modUtenti.php">ModUser</a></li>
                        <li><a href="deleteUser.php">DeleteUser</a></li>
                        <li><a href="Ban.php">BanUser</a></li>
                        <li><a href="add.php">AddAdmin</a></li>
                   </ul>
               </li>
               <li>Eventi
                   <ul>
                       <li><a href="mostraEventi.php"> Eventi</a></li>
                       <li><a href="deleteEvent.php"> DeleteEvento</a></li>
                   </ul>
               </li>
           </ul>

       </div>
       <div class="col-sm-8 text-left">
           <h1>Area Amministrativa</h1>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
           <hr>
           <h3>Test</h3>
           <p>Lorem ipsum...</p>
       </div>
       <div class="col-sm-2 sidenav">
           <div class="well">
               <p>ADS</p>
           </div>
           <div class="well">
               <p>ADS</p>
           </div>
       </div>
   </div>
</div>
</body>
</html>


