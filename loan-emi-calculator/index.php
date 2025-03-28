<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CHLYCVS9S7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CHLYCVS9S7');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-scale=1.0">
    <title>Loan EMI Calculator</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
  <header class="main-header fixed-top">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-white">
                    <h2 class="mb-0">
                        <i class="fas fa-calculator"></i>
                        EMI Calculator
                    </h2>
                    <p class="mb-0 small">Powered by DevSupport.co.in</p>
                </div>
               <!-- <nav>
                    <a href="#" class="text-white text-decoration-none me-3">
                        <i class="fas fa-home"></i> Home
                    </a>
                    <a href="#" class="text-white text-decoration-none">
                        <i class="fas fa-envelope"></i> Contact
                    </a>
                </nav>-->
            </div>
        </div>
    </header>
<body class="bg-light">
    <div class="container py-5">
        <div class="calculator-card card p-4">
            <h2 class="text-center mb-4">
                <i class="fas fa-calculator me-2"></i>Loan EMI Calculator
            </h2>
            
            <div class="row g-3">
                <!-- Loan Amount -->
                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fas fa-rupee-sign me-2"></i>Loan Amount
                    </label>
                    <input type="number" id="loanAmount" class="form-control" 
                           placeholder="E.g. 500000" min="1000" step="1000">
                </div>

                <!-- Interest Rate -->
                <div class="col-md-6">
                    <label class="form-label">
                        <i class="fas fa-percent me-2"></i>Annual Interest Rate
                    </label>
                    <input type="number" id="interestRate" class="form-control" 
                           placeholder="E.g. 8.5" min="1" max="30" step="0.1">
                </div>

                <!-- Loan Tenure -->
                <div class="col-12">
                    <label class="form-label">
                        <i class="fas fa-clock me-2"></i>Loan Tenure
                    </label>
                    <div class="input-group">
                        <input type="number" id="loanTenure" class="form-control" 
                               placeholder="E.g. 5" min="1" step="1">
                        <span class="input-group-text tenure-toggle" id="tenureType">
                            Years
                        </span>
                    </div>
                </div>

                <!-- Calculate Button -->
                <div class="col-12 mt-4">
                    <button class="btn btn-primary w-100" id="calculateBtn">
                        <i class="fas fa-calculator me-2"></i>Calculate EMI
                    </button>
                </div>
            </div>

            <!-- Results Section -->
            <div class="result-card mt-4 p-3" id="results" style="display: none;">
                <h5 class="text-center mb-3">Calculation Results</h5>
                <div class="row">
                    <div class="col-md-4 text-center mb-3">
                        <div class="fw-bold text-primary">Monthly EMI</div>
                        <div id="emiAmount" class="h5">₹0</div>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <div class="fw-bold text-primary">Total Interest</div>
                        <div id="totalInterest" class="h5">₹0</div>
                    </div>
                    <div class="col-md-4 text-center mb-3">
                        <div class="fw-bold text-primary">Total Payment</div>
                        <div id="totalPayment" class="h5">₹0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">
                        <i class="fas fa-globe me-2"></i>www.devsupport.co.in
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">
                        © 2025 Devsupport.co.in. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>