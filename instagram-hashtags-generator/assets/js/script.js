function fetchHashtags() {
    let keyword = document.getElementById("keyword").value.trim();
    
    if (!keyword) {
        alert("Please enter a keyword to generate hashtags.");
        return;
    }

    // Simulated API Response (Replace with real API if needed)
    let hashtags = generateHashtags(keyword);

    document.getElementById("hashtagList").innerHTML = hashtags;
    document.getElementById("hashtagBox").style.display = "block";
}

function generateHashtags(keyword) {
    let baseHashtags = [
        "#"+keyword, "#"+keyword+"Life", "#"+keyword+"Lover", "#"+keyword+"Vibes", 
        "#"+keyword+"Goals", "#"+keyword+"Style", "#"+keyword+"Gram", "#"+keyword+"Fun",
        "#"+keyword+"Daily", "#"+keyword+"Inspo", "#"+keyword+"Addict", "#"+keyword+"Moment"
    ];

    let popularHashtags = [
        "#InstaGood", "#PhotoOfTheDay", "#Beautiful", "#Happy", "#FollowMe", 
        "#LoveIt", "#TBT", "#Fashion", "#Style", "#Instadaily"
    ];

    return (baseHashtags.concat(popularHashtags)).join(" ");
}

function copyHashtags() {
    let hashtagText = document.getElementById("hashtagList").innerText;

    if (!hashtagText) {
        alert("No hashtags to copy. Generate hashtags first!");
        return;
    }

    let tempInput = document.createElement("textarea");
    tempInput.value = hashtagText;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);

    alert("Hashtags copied to clipboard!");
}