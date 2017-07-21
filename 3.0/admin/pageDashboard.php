
<?php
    //TODO inserire controllo sessione
    require("header.php");
?>
<div class="col-sm-2 text-left">
    <p></p>
    <div class="well">
        <p>ADS</p><!--TODO utente più attivo-->
    </div>
    <div class="well">
        <p>ADS</p><!--TODO utente più attivo-->
    </div>
</div>
<div class="col-sm-8 text-left">
    <h1>Area Amministrativa</h1>
    <p> TESTO DA INSERIRE</p> <!--TODO inserire descrizione delle funzionalità dell'area amministrativa-->
    <hr>
    <p>INSERIRE STATISTICHE</p><!--TODO inserire dei dati statistici (grafici?) del sistema-->

    <div class="row-fluid">
    <div class="well">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"><b>Statistics</b></div>
        </div>
        <div class="block-content collapse in">
            <div class="span3">
                <div class="chart" data-percent="73">73%</div>
                <div class="chart-bottom-heading"><span class="label label-info">Visitors</span>

                </div>
            </div>
            <div class="span3">
                <div class="chart" data-percent="53">53%</div>
                <div class="chart-bottom-heading"><span class="label label-info">Page Views</span>

                </div>
            </div>
            <div class="span3">
                <div class="chart" data-percent="83">83%</div>
                <div class="chart-bottom-heading"><span class="label label-info">Users</span>

                </div>
            </div>
            <div class="span3">
                <div class="chart" data-percent="13">13%</div>
                <div class="chart-bottom-heading"><span class="label label-info">Orders</span>

                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="row-fluid">
        <div class="well">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><b>Last Users</b></div>
            </div>
            <div class="block-content collapse in">
                <div class="box-body no-padding">
                <ul class="users-list clearfix">
                    <li>
                        <a class="users-list-name" href="#">Alexander Pierce</a>
                        <span class="users-list-date">Today</span>
                    </li>
                    <li>
                        <a class="users-list-name" href="#">Norman</a>
                        <span class="users-list-date">Yesterday</span>
                    </li>
                    <li>
                        <a class="users-list-name" href="#">Jane</a>
                        <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                        <a class="users-list-name" href="#">John</a>
                        <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                        <a class="users-list-name" href="#">Alexander</a>
                        <span class="users-list-date">13 Jan</span>
                    </li>
                    <li>
                        <a class="users-list-name" href="#">Sarah</a>
                        <span class="users-list-date">14 Jan</span>
                    </li>
                    <li>
                        <a class="users-list-name" href="#">Nora</a>
                        <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                        <a class="users-list-name" href="#">Nadia</a>
                        <span class="users-list-date">15 Jan</span>
                    </li>
                </ul>
            </div>
            <div>
                <a href="pageUsers.php" class="uppercase">View All Users</a>
            </div>
        </div>
    </div>
    </div>

<?php require("footer.php"); ?>



