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
    <meta name="description" content="Generate QR codes for links, text, contacts, or WiFi passwords. Download instantly with custom colors and size.">
    <meta name="keywords" content="QR Code Generator, Download QR, Custom QR Code, QR Code for WiFi, Contact QR">
    <meta name="author" content="DevSupport">

    <title>QR Code Generator</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- QR Code Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="assets/js/script.js"></script>

</head>
<body>

    <!-- Header -->
    <header class="bg-primary text-white text-center py-3 shadow-sm">
        <a class="navbar-brand"><i class="fas fa-qrcode"></i> QR Code Generator</a>
    </header>

    <!-- Main Content -->
    <div class="container text-center">
        <h2 class="mt-4 text-dark"><i class="fas fa-qrcode"></i> Generate Your QR Code</h2>
        <p class="text-muted">Enter text, a URL, or contact details and create a downloadable QR code.</p>

        <!-- Input Field -->
        <div class="mb-3">
            <input type="text" id="qrText" class="form-control" placeholder="Enter URL, Text, WiFi Details, etc.">
        </div>

        <!-- Customization -->
        <div class="row g-2">
            <div class="col-md-6">
                <label class="form-label">Choose Color:</label>
                <input type="color" id="qrColor" class="form-control form-control-color">
            </div>
            <div class="col-md-6">
                <label class="form-label">Size (px):</label>
                <input type="number" id="qrSize" class="form-control" value="200" min="100" max="500">
            </div>
        </div>

        <button class="btn btn-primary mt-3" onclick="generateQRCode()"><i class="fas fa-qrcode"></i> Generate QR Code</button>

        <!-- QR Code Display -->
        <div class="qr-box mt-4" id="qrBox">
            <div id="qrCode"></div>
            <button id="downloadBtn" class="btn btn-success mt-3" onclick="downloadQRCode()">
                <i class="fas fa-download"></i> Download QR Code
            </button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">
                        <i class="fas fa-globe me-2"></i>
                        <a href="https://www.devsupport.co.in" class="text-white text-decoration-none">www.devsupport.co.in</a>
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">© 2025 Devsupport.co.in. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
