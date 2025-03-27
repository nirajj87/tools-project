<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Speed Tester</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
</head>
<body>

    <header class="bg-primary text-white text-center py-3 shadow-sm">
        <a class="navbar-brand"><i class="fas fa-tachometer-alt"></i> Website Speed Tester</a>
    </header>

    <div class="container">
        <h2 class="mt-4 text-dark text-center"><i class="fas fa-globe"></i> Check Your Website Speed</h2>
        <p class="text-muted text-center">Enter a website URL to analyze speed & performance.</p>

        <div class="result-box">
            <input type="url" id="websiteUrl" class="form-control mb-3" placeholder="Enter website URL (e.g., https://example.com)">
            <button class="btn btn-primary w-100" onclick="checkSpeed()">
                <i class="fas fa-bolt"></i> Test Speed
            </button>

            <!-- Results -->
            <div id="results" class="mt-4 d-none">
                <h4 class="text-success"><i class="fas fa-chart-line"></i> Speed Results</h4>
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Metric</th>
                            <th>Mobile</th>
                            <th>Desktop</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Performance Score</td>
                            <td id="mobileScore"></td>
                            <td id="desktopScore"></td>
                        </tr>
                        <tr>
                            <td>Largest Contentful Paint (LCP)</td>
                            <td id="mobileLCP"></td>
                            <td id="desktopLCP"></td>
                        </tr>
                        <tr>
                            <td>First Contentful Paint (FCP)</td>
                            <td id="mobileFCP"></td>
                            <td id="desktopFCP"></td>
                        </tr>
                        <tr>
                            <td>Total Blocking Time (TBT)</td>
                            <td id="mobileTBT"></td>
                            <td id="desktopTBT"></td>
                        </tr>
                        <tr>
                            <td>Cumulative Layout Shift (CLS)</td>
                            <td id="mobileCLS"></td>
                            <td id="desktopCLS"></td>
                        </tr>
                    </tbody>
                </table>
                <h5>Recommendations:</h5>
                <ul id="recommendations"></ul>
            </div>
        </div>
    </div>

    <footer class="bg-primary text-white text-center py-3 mt-4">
        <div class="container">
            <p class="mb-0">© 2025 Devsupport.co.in. All rights reserved.</p>
        </div>
    </footer>

   <script src="assets/js/script.js"></script>

</body>
</html>
