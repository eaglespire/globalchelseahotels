<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chartisan example</title>
</head>
<body>
    <!-- Chart's container -->
    <div id="chart" style="height: 300px;"></div>
    <!-- Charting library -->
    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

    <script>
        const chart = new Chartisan({
            el: '#chart'
            , url: "@chart('sales_chart')"

        , 
        loader: {
        color: '#ff00ff',
        size: [30, 30],
        type: 'bar',
        textColor: '#ffff00',
        text: 'Loading some chart data...',
        },
        error: {
        color: '#ff00ff',
        size: [30, 30],
        text: 'Yarr! There was an error...',
        textColor: '#ffff00',
        type: 'general',
        debug: true,
        },


         hooks: new ChartisanHooks()
         .colors()
        
        });

    </script>
</body>
</html>

