<?php
/**
 * Created by PhpStorm.
 * User: Fabrizio
 * Date: 29/05/2017
 * Time: 10:30
 */
?>

<div class="container-fluid bg-3 text-center">
    <div class="row">
        <?php
            for($i = 0; $i <4; $i++) {
                if(isset($eventDB[$i])) {
                    echo '
                    <div class="col-sm-3" id="'.$eventDB[$i][0].'">
                        <p ><h2>' . $eventDB[$i][0] . '</h2>
                        <h4>' . $eventDB[$i][1] . '</h4>
                        </p >
                        <img src = "https://placehold.it/150x80?text=IMAGE" class="img-responsive" style = "width:100%" alt = "Image" >
                        <p>' . $eventDB[$i][4] . '</p>
                    </div >
                    ';
                }
        }
        ?>
    </div>
</div>

<div class="container-fluid bg-3 text-center">
    <div class="row">
        <?php
        for($i = 4; $i <8; $i++) {
            if(isset($eventDB[$i])) {
                echo '
                    <div class="col-sm-3" id="'.$eventDB[$i][0].'">
                        <p ><h2>' . $eventDB[$i][0] . '</h2>
                        <h4>' . $eventDB[$i][1] . '</h4>
                        </p >
                        <img src = "https://placehold.it/150x80?text=IMAGE" class="img-responsive" style = "width:100%" alt = "Image" >
                        <p>
                            
                            ' . $eventDB[$i][4] . '
                        </p>
                    </div >';
            }
        }
        ?>
    </div>
</div>






