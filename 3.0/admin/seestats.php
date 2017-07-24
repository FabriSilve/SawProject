<?php
    //require("../shared/accessManager.php");
    require("shared/header.php");
    require("shared/navbar.php");

    if (isset($_GET[col])) { $col=$_GET[col]; } else { $col=50; }
    $file=file("stat.log");
?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p><a href="pageDashboard.php"> Torna indietro</a></p>
            </div>
            <?php if(isset($_GET["message"]) && $_GET["message"] !== "" ) {
                echo '<div class="well">'.$_GET["message"].'</div>';
            }
            ?>
        </div>
        <div class="col-sm-8 text-left">
            <?php
            if ($col>sizeof($file)) { $col=sizeof($file); }
            echo "<h1>L`uitima <b>".$col."</b> visita sul sito:</h1>"; ?>
            <div class="well">
            <table width="680" cellspacing="1" cellpadding="1" border="0"
                   STYLE="table-layout:fixed">
                <tr bgcolor="#eeeeee">
                    <td class="zz" width="100"><b>Ora e Data</b></td>
                    <td class="zz" width="200"><b>I dati dell`utente</b></td>
                    <td class="zz" width="100"><b>IP/proxy</b></td>
                    <td class="zz" width="280"><b>URL visitato</b></td>
                </tr>
                    <?php
                    for ($si=sizeof($file)-1; $si+1>sizeof($file)-$col; $si--) {
                        $string=explode("|",$file[$si]);
                        $q1[$si]=$string[0]; // data e ora
                        $q2[$si]=$string[1]; // il nome di bot
                        $q3[$si]=$string[2]; // ip di bot
                        $q4[$si]=$string[3]; // indirizzio di visita
                        echo '<tr bgcolor="#eeeeee"><td class="zz">'.$q1[$si].'</td>';
                        echo '<td class="zz">'.$q2[$si].'</td>';
                        echo '<td class="zz">'.$q3[$si].'</td>';
                        echo '<td class="zz">'.$q4[$si].'</td></tr>';
                    }
                    echo '</table>';
                    echo '<br>Vedere le ultime <a href=?col=100>100</a> <a href=?col=500>500</a>';
                    echo '<a href=?col=1000>1000</a> visite.';
                    echo '<br>Vedere <a href=?col='.sizeof($file).'>tutte le visite</a>.</center>';
                    echo '</body></html>';
                    ?>
            </table>
            </div>
        </div>
    </div>
</div>

<?php
require("shared/footer.php");
?>
