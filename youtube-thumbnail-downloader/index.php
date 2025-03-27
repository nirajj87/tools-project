<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Download HD YouTube Thumbnails Easily. Enter a YouTube Video URL and get the HD thumbnail instantly.">
    <meta name="keywords" content="YouTube Thumbnail Downloader, HD YouTube Thumbnails, Download YouTube Thumbnails">
    <meta name="author" content="DevSupport">
    
    <title>YouTube Thumbnail Downloader</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Updated Header -->
    

	<header class="bg-primary text-white text-center py-3 shadow-sm">
         <a class="navbar-brand"><i class="fas fa-video"></i> YouTube Thumbnail Downloader</a>

    </header>
    <!-- Main Content -->
    <div class="container text-center">
        <h2 class="mt-4 text-dark"><i class="fas fa-download"></i> Download YouTube Thumbnails</h2>
        <p class="text-muted">Enter a YouTube Video URL and get the HD thumbnail instantly.</p>

        <!-- Input Field -->
        <div class="input-group mb-3">
            <input type="text" id="youtubeUrl" class="form-control" placeholder="Paste YouTube Video URL..." aria-label="YouTube URL">
            <button class="btn btn-primary" onclick="fetchThumbnail()"><i class="fas fa-search"></i> Get Thumbnail</button>
        </div>

        <!-- Thumbnail Display -->
        <div class="thumbnail-box" id="thumbnailBox">
            <h5>Thumbnail Preview:</h5>
            <img id="thumbnailImage" src="" alt="YouTube Thumbnail">
            <button id="downloadBtn" class="btn btn-success mt-3" onclick="downloadThumbnail()">
                <i class="fas fa-download"></i> Download HD Thumbnail
            </button>
        </div>
    </div>

    <!-- Updated Footer -->
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

    <!-- JavaScript -->
    <script src="assets/js/script.js"></script>
</body>

</body>
</html>
