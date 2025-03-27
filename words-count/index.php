<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Word Counter & Read Time Calculator. Count words, characters, numbers, and detect language dynamically.">
    <meta name="keywords" content="Word Counter, Read Time Calculator, Character Counter, Number Count, Language Detection">
    <title>Word Counter & Read Time Calculator</title>
    
    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Custom Styles -->
    <style>
        body { background-color: #f8f9fa; }
        .container { max-width: 700px; }
        textarea { resize: none; }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="bg-primary text-white text-center py-3 shadow-sm">
        <h1 class="fs-3"><i class="fas fa-file-alt"></i> Word Counter & Read Time Calculator</h1>
        <p class="fs-6">Instantly count words, numbers & detect language</p>
    </header>

    <!-- Main Content -->
    <main class="container bg-white p-4 mt-4 rounded shadow-sm">
        <h2 class="text-center mb-3">Enter Your Text Below</h2>

        <textarea id="textInput" class="form-control" rows="6" placeholder="Start typing or paste your text here..."></textarea>

        <div class="mt-3 p-3 bg-light rounded">
            <p><strong><i class="fas fa-sort-numeric-up"></i> Total Words:</strong> <span id="wordCount">0</span></p>
            <p><strong><i class="fas fa-font"></i> Total Characters:</strong> <span id="charCount">0</span></p>
            <p><strong><i class="fas fa-calculator"></i> Total Numbers (Integers):</strong> <span id="numberCount">0</span></p>
            <p><strong><i class="fas fa-globe"></i> Detected Language:</strong> <span id="detectedLanguage">Unknown</span></p>
            <p><strong><i class="fas fa-clock"></i> Estimated Read Time:</strong> <span id="readTime">0 min</span></p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">
                        <i class="fas fa-globe me-2"></i><a href="https://www.devsupport.co.in" class="text-white text-decoration-none">www.devsupport.co.in</a>
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">© 2025 Devsupport.co.in. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery for Live Word Count -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>

</body>
</html>
