const dropArea = document.getElementById("dropArea");
const fileInput = document.getElementById("pdfInput");

dropArea.addEventListener("dragover", (e) => {
  e.preventDefault();
  dropArea.classList.add("drag-over");
});

dropArea.addEventListener("dragleave", () => {
  dropArea.classList.remove("drag-over");
});

dropArea.addEventListener("drop", (e) => {
  e.preventDefault();
  dropArea.classList.remove("drag-over");
  fileInput.files = e.dataTransfer.files;
});

document.getElementById("convertBtn").addEventListener("click", convertPdfToWord);

pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js";

let wordBlob = null;
let fileName = "converted";

function convertPdfToWord() {
    const fileInput = document.getElementById('pdfInput');
    const progressContainer = document.getElementById('progressContainer');
    const progressText = document.getElementById('progressText');
    const progressBar = document.getElementById('progressBar');
    const downloadSection = document.getElementById('downloadSection');
    const currentPageEl = document.getElementById('currentPage');
    const totalPagesEl = document.getElementById('totalPages');

    if (fileInput.files.length === 0) {
        alert("Please select a PDF file.");
        return;
    }

    const file = fileInput.files[0];
    fileName = file.name.replace(/\.pdf$/, "");
    downloadSection.style.display = "none";
    progressContainer.style.display = "block";

    const reader = new FileReader();
    reader.onload = function(event) {
        const typedArray = new Uint8Array(event.target.result);

        pdfjsLib.getDocument(typedArray).promise.then(async function(pdf) {
            let fullText = "";
            const totalPages = pdf.numPages;
            totalPagesEl.textContent = totalPages;
            
            for (let pageNum = 1; pageNum <= totalPages; pageNum++) {
                let page = await pdf.getPage(pageNum);
                let textContent = await page.getTextContent();
                let pageText = textContent.items.map(item => item.str).join(" ");
                fullText += `Page ${pageNum}:\n${pageText}\n\n`;

                let progressValue = Math.round((pageNum / totalPages) * 100);
                progressBar.value = progressValue;
                progressText.textContent = progressValue + "%";
                currentPageEl.textContent = pageNum;
            }

            generateWordFile(fullText);
        }).catch(error => {
            console.error("Error processing PDF:", error);
            alert("Failed to process PDF. See console for details.");
        });
    };

    reader.readAsArrayBuffer(file);
}

function generateWordFile(fullText) {
    let blob = new Blob([fullText], { type: "application/msword" });
    wordBlob = blob;
    document.getElementById('downloadSection').style.display = "block";
}

function downloadWord() {
    if (wordBlob) {
        saveAs(wordBlob, fileName + ".doc");
    } else {
        alert("No file generated yet!");
    }
}