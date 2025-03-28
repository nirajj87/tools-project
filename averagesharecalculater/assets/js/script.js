function toggleMode() { document.body.classList.toggle("dark-mode"); }
document.getElementById("stockForm").addEventListener("submit", function(event) {
    event.preventDefault();
    let buy_price = parseFloat(document.getElementById("buy_price").value);
    let buy_shares = parseInt(document.getElementById("buy_shares").value);
    let current_price = parseFloat(document.getElementById("current_price").value);
    let target_price = parseFloat(document.getElementById("target_price").value);
    fetch("calculate.php", {
        method: "POST", 
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `buy_price=${buy_price}&buy_shares=${buy_shares}&current_price=${current_price}&target_price=${target_price}`
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("additional_shares").textContent = data.additional_shares;
        document.getElementById("total_cost").textContent = data.total_cost.toFixed(2);
        document.getElementById("resultBox").style.display = "block";
        Highcharts.chart("chartContainer", {
            chart: { type: "column" },
            title: { text: "Investment Breakdown" },
            xAxis: { categories: ["Initial", "Additional"] },
            yAxis: { title: { text: "Amount (₹)" } },
            series: [{ name: "Investment", data: [buy_price * buy_shares, data.total_cost] }]
        });
        document.getElementById("chartContainer").style.display = "block";
    })
    .catch(error => console.error("Error:", error));
});