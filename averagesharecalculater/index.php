<!DOCTYPE html>
<html lang="en">
<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CHLYCVS9S7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CHLYCVS9S7');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Average Calculator</title>
    <link rel="stylesheet" href="assets/css/style.css">
   
</head>
<body>
    <button class="toggle-btn" onclick="toggleMode()">🌙 Toggle Mode</button>
    <div class="container">
        <h2>Stock Average Calculator</h2>
        <p>This Stock Average Calculator is a web-based tool that helps investors calculate the additional shares needed to reach a target average price. Users enter their buy price, number of shares, current market price, and target price, and the calculator determines how many additional shares they should buy and the total investment cost.</p>
        <form id="stockForm">
            <input type="number" step="0.01" id="buy_price" placeholder="Buy Price per Share (900.00)" required>
            <input type="number" id="buy_shares" placeholder="Shares Bought (100) " required>
            <input type="number" step="0.01" id="current_price" placeholder="Current Market Price (600.00)" required>
            <input type="number" step="0.01" id="target_price" placeholder="Target Average Price (880)" required>
            <button type="submit">Calculate</button>
        </form>
        <div class="result" id="resultBox">
            <h3>Calculation Result</h3>
            <p><strong>Additional Shares:</strong> <span id="additional_shares"></span></p>
            <p><strong>Total Cost:</strong> ₹<span id="total_cost"></span></p>
        </div>
        <div id="chartContainer" class="result"></div>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
