function fetchStockData() {
    fetch('stocks.php')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('stock-container');
            container.innerHTML = '';
            data.stocks.forEach(stock => {
                const resistance = Array.isArray(stock.resistance) ? stock.resistance.join(', ₹') : 'N/A';
                const support = Array.isArray(stock.support) ? stock.support.join(', ₹') : 'N/A';
                const card = `
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-2">${stock.name}</h2>
                        <p><strong>Current Price:</strong> ₹${stock.current_price || 'N/A'}</p>
                        <p><strong>Last Closing:</strong> ₹${stock.last_closing || 'N/A'}</p>
                        <p><strong>Opening:</strong> ₹${stock.opening || 'N/A'}</p>
                        <p><strong>Trend:</strong> ${stock.trend || 'N/A'}</p>
                        <p><strong>Strategy:</strong> ${stock.strategy || 'N/A'}</p>
                        <p><strong>Entry:</strong> ₹${stock.entry || 'N/A'}</p>
                        <p><strong>Exit:</strong> ₹${stock.exit || 'N/A'}</p>
                        <p><strong>Stop-Loss:</strong> ₹${stock.stop_loss || 'N/A'}</p>
                        <p><strong>Resistance Levels:</strong> ₹${resistance}</p>
                        <p><strong>Support Levels:</strong> ₹${support}</p>
                        <p><strong>Position:</strong> ${stock.position || 'N/A'}</p>
                    </div>
                `;
                container.innerHTML += card;
            });
            document.getElementById('last-updated').textContent = new Date().toLocaleString('en-IN', { timeZone: 'Asia/Kolkata' });
        })
        .catch(error => console.error('Error fetching stock data:', error));
}

fetchStockData();
setInterval(fetchStockData, 3600000);