  // Toggle between Years and Months
  document.getElementById('tenureType').addEventListener('click', function() {
    const tenureType = this;
    const tenureInput = document.getElementById('loanTenure');
    
    if(tenureType.textContent === 'Years') {
        tenureType.textContent = 'Months';
        tenureInput.value = Math.round(tenureInput.value * 12);
    } else {
        tenureType.textContent = 'Years';
        tenureInput.value = Math.round(tenureInput.value / 12);
    }
});

// EMI Calculation Function
function calculateEMI() {
    const loanAmount = parseFloat(document.getElementById('loanAmount').value);
    const annualRate = parseFloat(document.getElementById('interestRate').value);
    let tenure = parseFloat(document.getElementById('loanTenure').value);
    const tenureType = document.getElementById('tenureType').textContent;

    // Convert tenure to months if in years
    if(tenureType === 'Years') {
        tenure *= 12;
    }

    // Monthly interest rate
    const monthlyRate = (annualRate / 12) / 100;

    // EMI Calculation
    const emi = (loanAmount * monthlyRate * Math.pow(1 + monthlyRate, tenure)) / 
                (Math.pow(1 + monthlyRate, tenure) - 1);

    // Total calculations
    const totalPayment = emi * tenure;
    const totalInterest = totalPayment - loanAmount;

    return {
        emi: emi,
        totalInterest: totalInterest,
        totalPayment: totalPayment
    };
}

// Display Results
function displayResults(results) {
    document.getElementById('results').style.display = 'block';
    document.getElementById('emiAmount').textContent = 
        '₹' + results.emi.toFixed(2);
    document.getElementById('totalInterest').textContent = 
        '₹' + results.totalInterest.toFixed(2);
    document.getElementById('totalPayment').textContent = 
        '₹' + results.totalPayment.toFixed(2);
}

// Event Listeners
document.getElementById('calculateBtn').addEventListener('click', function(e) {
    e.preventDefault();
    const results = calculateEMI();
    displayResults(results);
});

// AJAX-style calculation with input validation
['input', 'change'].forEach(event => {
    ['loanAmount', 'interestRate', 'loanTenure'].forEach(id => {
        document.getElementById(id).addEventListener(event, function() {
            if(this.checkValidity()) {
                const results = calculateEMI();
                displayResults(results);
            }
        });
    });
});