<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Pattern Detection</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<canvas id="stockChart"></canvas>

<script>
fetch('signal_backend.php') // PHP script ka URL daalo
    .then(response => response.json())
    .then(data => {
        const ctx = document.getElementById('stockChart').getContext('2d');

        // Data format karna
        const labels = data.candles.map(c => c.time);
        const prices = data.candles.map(c => c.close);

        // Signal points mark karna
        const signalPoints = data.signals.map(s => ({
            x: labels.indexOf(s.time),
            y: prices[labels.indexOf(s.time)],
            r: 6, // Point size
            label: s.pattern
        }));

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: "Stock Price",
                    data: prices,
                    borderColor: "blue",
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                plugins: {
                    annotation: {
                        annotations: signalPoints.map(point => ({
                            type: 'point',
                            xValue: point.x,
                            yValue: point.y,
                            backgroundColor: 'red',
                            radius: point.r
                        }))
                    }
                }
            }
        });
    });
</script>

</body>
</html>
