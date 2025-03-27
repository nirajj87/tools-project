
const fileInput = document.getElementById("wordInput");
let pdfBlob = null;
let fileName = "converted";

document.getElementById("convertBtn").addEventListener("click", convertWordToPDF);

function convertWordToPDF() {
  if (fileInput.files.length === 0) {
    alert("⚠ Please select a Word file.");
    return;
  }

  const file = fileInput.files[0];
  fileName = file.name.replace(/\.docx$/, ""); // Remove .docx extension

  const reader = new FileReader();
  reader.onload = function(event) {
    const arrayBuffer = event.target.result;

    // Show Progress Bar
    document.getElementById("progressContainer").classList.remove("hidden");
    updateProgressBar(20); // Start at 20%

    mammoth.convertToHtml({ arrayBuffer: arrayBuffer })
      .then(result => {
        updateProgressBar(50); // Midway progress

        let cleanText = result.value.replace(/[\uFFFC\uFEFF]/g, ""); // Remove unwanted Unicode chars
        let htmlToText = cleanText
          .replace(/<\/p>/g, "\n\n")   // Convert paragraphs to line breaks
          .replace(/<\/?[^>]+(>|$)/g, ""); // Remove all HTML tags (basic text)

        // PDF with Header & Footer
        const pdfDefinition = {
          content: [
            { text: "Word to PDF Converted Document", style: "header", alignment: "center" },
            { text: htmlToText, style: "body" },
            { text: "Generated using Word to PDF Converter", style: "footer", alignment: "center" }
          ],
          styles: {
            header: { fontSize: 16, bold: true, margin: [0, 0, 0, 10] },
            body: { fontSize: 12 },
            footer: { fontSize: 10, margin: [0, 20, 0, 0] }
          }
        };

        pdfBlob = pdfMake.createPdf(pdfDefinition);
        updateProgressBar(100); // Complete
        setTimeout(() => {
          document.getElementById("downloadSection").classList.remove("hidden");
        }, 500);
      })
      .catch(error => {
        console.error("Error processing DOCX:", error);
        alert("❌ Failed to process Word file. See console for details.");
      });
  };
  reader.readAsArrayBuffer(file);
}

function downloadPDF() {
  if (pdfBlob) {
    pdfBlob.download(fileName + ".pdf");
  } else {
    alert("⚠ No PDF generated yet!");
  }
}

function updateProgressBar(value) {
  document.getElementById("progressBar").style.width = value + "%";
}