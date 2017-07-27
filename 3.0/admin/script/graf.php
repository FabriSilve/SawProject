<link rel="stylesheet" href="http://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css"/>
<link type="text/css" rel="StyleSheet" href="http://bootstraptema.ru/plugins/2016/shieldui/style.css"/>
<script src="http://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script src="http://bootstraptema.ru/plugins/2016/shieldui/script.js"></script>

<br><br><br>
<div class="row">
    <div class="col-md-8 text-left col-md-offset-2">
        <div id="chart"><!-- Grafico -->
            <script>
                $(document).ready(function () {
                    var internetUsersPercent = [
                        {x: "1994", y: 4.9},
                        {x: "1995", y: 9.2},
                        {x: "1996", y: 16.4},
                        {x: "1997", y: 21.6},
                        {x: "1998", y: 30.1},
                        {x: "1999", y: 35.9},
                        {x: "2000", y: 43.1},
                        {x: "2001", y: 49.2},
                        {x: "2002", y: 59.0},
                        {x: "2003", y: 61.9},
                        {x: "2004", y: 65},
                        {x: "2005", y: 68.3},
                        {x: "2006", y: 69.2},
                        {x: "2007", y: 75.3},
                        {x: "2008", y: 74.2},
                        {x: "2009", y: 71.2},
                        {x: "2010", y: 74.2},
                        {x: "2011", y: 78.2}
                    ];

                    $("#chart").shieldChart({
                        theme: "bootstrap",
                        primaryHeader: {
                            text: "<b>Visite degli utenti</b>"
                        },
                        axisY: {
                            title: {
                                text: "<b>Numero Eventi</b>"
                            }
                        },
                        dataSeries: [{
                            seriesType: "area",
                            data: internetUsersPercent
                        }]
                    });
                });
            </script><!-- /.Grafico -->
        </div>
    </div>
</div>
