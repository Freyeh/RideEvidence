@extends('layout.app')

@section('content')
<br>

    <h1>Charts</h1> <br>

<div id="barchart_material" style="width: 100%; height: 300px;"></div> <br>
<div id="barchart_material2" style="width: 100%; height: 500px;"></div> <br>
<div id="piechart" style="width: 100%; height: 100%"></div>
<div id="piechart2" style="width: 250px; height: 100%;"></div>




    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">

        var analytics = <?php echo $name; ?>
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable(
                analytics);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':'Cars used', 'width':550, 'height':400};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>

<script type="text/javascript">

    var analytics2 = <?php echo $type; ?>
        // Load google charts
        google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable(
            analytics2);

        // Optional; add a title and set the width and height of the chart
        var options = {'title':'Type of trip', 'width':550, 'height':400};

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
    }
</script>



<script type="text/javascript">

    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Ride number', 'Cost euros'],

            @php
                foreach($rides as $ride) {
                    echo "['".$ride->id."', ".$ride->cost."],";
                }
            @endphp
        ]);

        var options = {
            chart: {
                title: 'Cost of Rides',
            },
            bars: 'vertical'
        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

<script type="text/javascript">

    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Repair reason', 'Cost euros'],

            @php
                foreach($repairs as $repair) {
                    echo "['".$repair->reason."', ".$repair->costEuro."],";
                }
            @endphp
        ]);

        var options = {
            chart: {
                title: 'Cost of Repairs',
            },
            bars: 'horizontal'
        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material2'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

@endsection
