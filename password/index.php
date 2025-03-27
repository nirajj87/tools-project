<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Generate strong passwords with customizable length, uppercase, numbers, and symbols.">
    <meta name="keywords" content="Password Generator, Secure Password, Random Password, Strong Password">
    <meta name="author" content="DevSupport">

    <title>Password Generator</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

    <!-- Header -->
    <header class="bg-primary text-white text-center py-3 shadow-sm">
        <a class="navbar-brand"><i class="fas fa-key"></i> Password Generator</a>
    </header>

    <!-- Main Content -->
    <div class="container">
        <h2 class="mt-4 text-dark text-center"><i class="fas fa-lock"></i> Generate a Strong Password</h2>
        <p class="text-muted text-center">Customize your password with length, uppercase, numbers, and symbols.</p>

        <div class="password-box">
            <!-- Password Display -->
            <div class="mb-3">
                <input type="text" id="passwordOutput" class="form-control password-output" readonly>
                <span class="copy-btn" onclick="copyPassword()"><i class="fas fa-copy"></i> Copy</span>
            </div>

            <!-- Options -->
            <div class="mb-3">
                <label class="form-label">Password Length:</label>
                <input type="number" id="passwordLength" class="form-control" value="12" min="6" max="50">
            </div>

            <div class="form-check">
                <input type="checkbox" id="includeUppercase" class="form-check-input" checked>
                <label class="form-check-label">Include Uppercase (A-Z)</label>
            </div>

            <div class="form-check">
                <input type="checkbox" id="includeNumbers" class="form-check-input" checked>
                <label class="form-check-label">Include Numbers (0-9)</label>
            </div>

            <div class="form-check">
                <input type="checkbox" id="includeSymbols" class="form-check-input" checked>
                <label class="form-check-label">Include Symbols (!@#$%)</label>
            </div>

            <button class="btn btn-primary mt-3 w-100" onclick="generatePassword()"><i class="fas fa-key"></i> Generate Password</button>
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
                    <p class="mb-0">© 2024 Devsupport.co.in. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="assets/js/script.js"></script>
</body>
</html>
