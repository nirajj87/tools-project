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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Calculate GST in India online. Enter the original price, select the GST rate, and get instant calculations including CGST & SGST breakdown.">
    <meta name="keywords" content="GST Calculator, India GST, GST Tax, CGST, SGST, Online GST">
    <title>GST Calculator India | Online GST Tax Calculation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</head>
<body class="bg-gray-100">
    
    <!-- Header -->
    <header class="bg-blue-600 text-white text-center py-4 shadow-md">
        <h1 class="text-2xl font-bold"><i class="fas fa-calculator"></i> GST Calculator India</h1>
        <p class="text-sm">Instant GST Calculation with CGST & SGST Breakdown</p>
    </header>

    <!-- Main Container -->
    <main class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg mt-6">
        <h2 class="text-xl font-semibold mb-4 text-center">Calculate GST Amount</h2>

        <!-- Input Fields -->
        <div class="mb-4">
            <label class="block font-medium">Original Price (₹):</label>
            <input type="number" id="originalPrice" class="w-full p-2 border rounded mt-1" placeholder="Enter price">
        </div>

        <div class="mb-4">
            <label class="block font-medium">GST Rate (%):</label>
            <select id="gstRate" class="w-full p-2 border rounded mt-1">
                <option value="5">5%</option>
                <option value="12">12%</option>
                <option value="18">18%</option>
                <option value="28">28%</option>
            </select>
        </div>

        <!-- Calculate Button -->
        <button id="calculateBtn" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-700">
            <i class="fas fa-calculator"></i> Calculate GST
        </button>

        <!-- Results Display -->
        <div id="result" class="hidden mt-6 p-4 bg-gray-100 rounded-lg">
            <h3 class="text-lg font-semibold mb-2">GST Calculation:</h3>
            <p><strong>GST Amount (₹):</strong> <span id="gstAmount">0.00</span></p>
            <p><strong>Total Price After GST (₹):</strong> <span id="finalPrice">0.00</span></p>
            <p><strong>CGST (₹):</strong> <span id="cgst">0.00</span> | <strong>SGST (₹):</strong> <span id="sgst">0.00</span></p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center py-4 mt-6">
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
</body>
</html>
