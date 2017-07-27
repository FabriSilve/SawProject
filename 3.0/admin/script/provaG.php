<link rel="stylesheet" href="http://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css"/>
<link type="text/css" rel="StyleSheet" href="http://bootstraptema.ru/plugins/2016/shieldui/style.css"/>
<script src="http://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="http://bootstraptema.ru/plugins/2016/shieldui/script.js"></script>

<br><br><br>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div id="chart">
            <?php
            require("../shared/accessManager.php");
            require("dbAccess.php");
            require_once('../jpgraph/src/jpgraph.php');
            require_once('../jpgraph/src/jpgraph_line.php');
            $error = "";
            $ydataDB = array();
            $xdataDB = array();
            $count = 0;
            try {
                $conn = new PDO("mysql:host=$server;dbname=$dbName", $dbUser, $dbPass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // y - num eventi
                $stmt = $conn->prepare("SELECT id FROM Events");
                $stmt->execute();
                $ydataDB[$count++] = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $ydataDB[$count++] = array("id" => $row["id"]);
                }

                // x - data
                $stmt = $conn->prepare("SELECT CURRENT_DATE()-5 UNION SELECT CURRENT_DATE()+5 as date;");
                $stmt->execute();
                $xdataDB[$count++] = array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $xdataDB[$count++] = array("date" => $row["date"]);
                }

                $graph = new Graph(400, 300, 'auto', 10, true);
                $graph->SetScale('textlin');

                $lineplot = new LinePlot($ydata, $xdata);
                $lineplot->SetColor('forestgreen');

                $graph->Add($lineplot);
                $graph->title->Set('Eventi');
                $graph->xaxis->title->Set('Data');
                $graph->yaxis->title->Set('Eventi');

                $graph->xaxis->SetColor('#СС0000');
                $graph->yaxis->SetColor('#СС0000');

                $lineplot->SetWeight(3);

                $graph->SetBackgroundGradient('ivory', 'orange');

                $graph->SetShadow(4);

                $graph->Stroke();

                $conn = null;
            } catch (PDOException $e) {
                $error = "Errore nel database" . " ERROR " . $e->getMessage();
            }

            if (!empty($error)) {
                echo '<hr><div class="well">' . $error . '</div>';
            }
            ?>
        </div>
    </div>
</div>