<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Convert your Word (.docx) files to PDF with high accuracy. Free, fast, and SEO-friendly online tool.">
  <meta name="keywords" content="Word to PDF, DOCX to PDF, Convert Word, Online PDF Converter">
  <meta name="author" content="Your Name">
  <title>Word to PDF Converter - Fast & Free</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.71/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.71/vfs_fonts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.2/mammoth.browser.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">

  <!-- HEADER -->
  <header class="bg-blue-600 text-white py-4 w-full text-center shadow-lg">
    <h1 class="text-2xl font-bold">Word to PDF Converter</h1>
  </header>

  <main class="w-full max-w-lg bg-white p-6 mt-6 rounded-lg shadow-lg">
    <h2 class="text-lg font-semibold mb-4 text-center">Upload & Convert Word to PDF</h2>

    <!-- Upload Box -->
    <div id="dropArea" class="upload-box rounded-lg">
      <input type="file" id="wordInput" accept=".docx" class="hidden">
      <label for="wordInput" class="cursor-pointer block">📂 Click or Drag & Drop a Word File</label>
    </div>

    <!-- Progress Bar -->
    <div class="progress-container hidden" id="progressContainer">
      <div class="progress-bar" id="progressBar"></div>
    </div>

    <button id="convertBtn" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg w-full">Convert to PDF</button>
    <div id="downloadSection" class="hidden mt-4 text-center">
      <button onclick="downloadPDF()" class="bg-green-500 text-white px-4 py-2 rounded-lg">Download PDF</button>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="w-full text-center py-4 mt-6 bg-blue-600 text-white">
  &copy; 2025 Devsupport.co.in. All rights reserved.
</footer>
  <script src="assets/js/script.js"></script>
</body>
</html>
