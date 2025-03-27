<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Convert PDF to Word with OCR support. Upload or drag your file and get a downloadable Word document.">
  <meta name="keywords" content="PDF to Word, OCR, Convert PDF, Free PDF Converter">
  <meta name="author" content="Your Website Name">
  <title>PDF to Word Converter | OCR Supported | Free Online Tool</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
  <script src="assets/js/script.js"></script>
 
</head>
<body class="bg-gray-50 min-h-screen flex flex-col items-center justify-center">
  
  <header class="w-full bg-blue-600 text-white p-6 text-center shadow-lg">
    <h1 class="text-3xl font-bold">PDF to Word Converter</h1>
    <p class="text-lg mt-2">Fast, Free & OCR Supported</p>
  </header>

  <main class="w-full max-w-2xl bg-white rounded-xl shadow-md p-8 mt-6">
    <section id="uploadSection">
      <div id="dropArea" class="upload-box border-2 border-dashed p-6 text-center cursor-pointer rounded-lg bg-gray-100 hover:bg-gray-200">
        <input type="file" id="pdfInput" accept=".pdf" class="hidden">
        <label for="pdfInput" class="cursor-pointer flex flex-col items-center">
          <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
          </svg>
          <p class="text-gray-700 font-semibold">Drag & Drop or Click to Select a PDF File</p>
          <p class="text-sm text-gray-500 mt-1">Max Size: 50MB</p>
        </label>
      </div>
    </section>

    <div id="status" class="text-center my-4 text-lg font-semibold text-gray-600"></div>

    <button id="convertBtn" class="convert-btn w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">
      Convert to Word
    </button>

    <div id="progressContainer" class="mt-6 hidden text-center">
      <p class="text-gray-700">Processing: <span id="currentPage">0</span> / <span id="totalPages">0</span></p>
      <progress id="progressBar" value="0" max="100" class="w-full h-4 rounded-lg"></progress>
      <p id="progressText" class="text-gray-500 text-sm mt-2">0%</p>
    </div>

    <div id="downloadSection" class="mt-6 hidden text-center">
      <button onclick="downloadWord()" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600">
        Download Word File
      </button>
    </div>
  </main>

  <footer class="w-full bg-blue-600 text-white text-center p-6 mt-8">
    <p>&copy; 2025 PDF to Word Converter | All Rights Reserved</p>
  </footer>
</body>
</html>
