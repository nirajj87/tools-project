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
    <meta name="description" content="Generate trending Instagram hashtags instantly based on keywords. Perfect for influencers and social media managers!">
    <meta name="keywords" content="Instagram Hashtags, Trending Hashtags, Social Media Growth, Hashtag Generator">
    <meta name="author" content="DevSupport">

    <title>Instagram Hashtag Generator</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-dark">
        <div class="container text-center">
            <a class="navbar-brand"><i class="fas fa-hashtag"></i> Instagram Hashtag Generator</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container text-center">
        <h2 class="mt-4 text-dark"><i class="fas fa-hashtag"></i> Generate Trending Hashtags</h2>
        <p class="text-muted">Enter a keyword and get trending Instagram hashtags instantly.</p>

        <!-- Input Field -->
        <div class="input-group mb-3">
            <input type="text" id="keyword" class="form-control" placeholder="Enter keyword (e.g., travel, fitness)" aria-label="Hashtag Keyword">
            <button class="btn btn-primary" onclick="fetchHashtags()"><i class="fas fa-search"></i> Get Hashtags</button>
        </div>

        <!-- Hashtag Display -->
        <div class="hashtag-box" id="hashtagBox">
            <p>Trending Hashtags:</p>
            <div class="hashtags" id="hashtagList"></div>
            <button id="copyBtn" class="btn btn-success mt-3" onclick="copyHashtags()">
                <i class="fas fa-copy"></i> Copy All Hashtags
            </button>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <p>
                <i class="fas fa-globe me-2"></i> www.devsupport.co.in | © 2025 Devsupport. All rights reserved.
            </p>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
  
</body>
</html>
