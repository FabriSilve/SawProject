
<?php
    require("shared/accessManager.php");
    require("shared/header.php");
    require("shared/navbar.php");
?>


<div class="container-fluid text-left">
    <div class="row content adminbody">
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
           <p><b>STATISTICHE:</b></p><!--TODO inserire dei dati statistici (grafici?) del sistema-->
           <div class="well">
               <div id="piechart"></div>
               <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
               <script type="text/javascript">
                   // Load google charts
                   google.charts.load('current', {'packages':['corechart']});
                   google.charts.setOnLoadCallback(drawChart);

                   // Draw the chart and set the chart values
                   function drawChart() {
                       var data = google.visualization.arrayToDataTable([
                           ['Task', 'Percentuale'],
                           ['Visitors', 8],
                           ['Page Views', 2],
                           ['Users', 4]
                       ]);

                       // Optional; add a title and set the width and height of the chart
                       var options = {'title':'Statistiche', 'width':550, 'height':400};

                       // Display the chart inside the <div> element with id="piechart"
                       var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                       chart.draw(data, options);
                   }
               </script>
           </div>
       </div>
       <div class="col-sm-2 sidenav">
           <div class="well">
                 <div class="chip">
                   <img src="../media/img_avatar.jpg" alt="Person" width="50" height="50">
                    Admin
               </div>
             <!--TODO utente più attivo-->
           </div>
           <div class="well">
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
               <p><a href="#" class="fa fa-google"></a></p><!--TODO evento più seguito-->
           </div>
           <!--TODO se vogliamo altro-->
       </div>
   </div>
<?php
    require("shared/footer.php");
?>



