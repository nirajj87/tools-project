function generateQRCode() {
    let qrText = document.getElementById("qrText").value.trim();
    let qrColor = document.getElementById("qrColor").value;
    let qrSize = document.getElementById("qrSize").value;

    if (!qrText) {
        alert("Please enter text or a URL to generate a QR code.");
        return;
    }

    // Clear any existing QR code
    document.getElementById("qrCode").innerHTML = "";

    // Generate new QR Code
    let qrCode = new QRCode(document.getElementById("qrCode"), {
        text: qrText,
        width: qrSize,
        height: qrSize,
        colorDark: qrColor,
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });

    document.getElementById("qrBox").style.display = "block";
}

function downloadQRCode() {
    let qrCanvas = document.querySelector("#qrCode canvas");

    if (!qrCanvas) {
        alert("Generate a QR code first!");
        return;
    }

    let qrImage = qrCanvas.toDataURL("image/png");
    let downloadLink = document.createElement("a");
    downloadLink.href = qrImage;
    downloadLink.download = "QRCode.png";
    downloadLink.click();
}