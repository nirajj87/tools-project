function fetchThumbnail() {
    let url = document.getElementById("youtubeUrl").value;
    let videoId = extractVideoId(url);

    if (videoId) {
        let thumbnailUrl = `https://img.youtube.com/vi/${videoId}/maxresdefault.jpg`;
        document.getElementById("thumbnailImage").src = thumbnailUrl;
        document.getElementById("thumbnailBox").style.display = "block";
    } else {
        alert("Invalid YouTube URL! Please enter a correct link.");
    }
}

function extractVideoId(url) {
    let match = url.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/);
    return match ? match[1] : null;
}

function downloadThumbnail() {
    let img = document.getElementById("thumbnailImage");
    if (!img.src) {
        alert("Please fetch a thumbnail first.");
        return;
    }

    // Create a Canvas and Draw Image
    let canvas = document.createElement("canvas");
    let ctx = canvas.getContext("2d");
    let image = new Image();
    image.crossOrigin = "Anonymous"; // Prevent CORS issues
    image.src = img.src;

    image.onload = function() {
        canvas.width = image.width;
        canvas.height = image.height;
        ctx.drawImage(image, 0, 0, image.width, image.height);

        // Convert to Downloadable Image
        let downloadLink = document.createElement("a");
        downloadLink.href = canvas.toDataURL("image/png");
        downloadLink.download = "YouTube_Thumbnail.png";
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    };
}