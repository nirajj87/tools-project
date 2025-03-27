$(document).ready(function () {
    $("#textInput").on("input", function () {
        let text = $(this).val().trim();

        // Word & Character Count
        let wordCount = text.length > 0 ? text.split(/\s+/).length : 0;
        let charCount = text.length;

        // Integer (Number) Count
        let numberMatch = text.match(/\b\d+\b/g);
        let numberCount = numberMatch ? numberMatch.length : 0;

        // Read Time Calculation
        let readTime = wordCount / 200;
        let formattedTime = readTime < 1 ? Math.ceil(readTime * 60) + " sec" : readTime.toFixed(1) + " min";

        // Language Detection (Basic Check)
        let detectedLanguage = detectLanguage(text);

        // Update UI
        $("#wordCount").text(wordCount);
        $("#charCount").text(charCount);
        $("#numberCount").text(numberCount);
        $("#readTime").text(formattedTime);
        $("#detectedLanguage").text(detectedLanguage);
    });

    function detectLanguage(text) {
        const hindiPattern = /[\u0900-\u097F]/; // Hindi Unicode Range
        const englishPattern = /[a-zA-Z]/; // English Alphabet

        let hasHindi = hindiPattern.test(text);
        let hasEnglish = englishPattern.test(text);

        if (hasHindi && hasEnglish) return "Mixed (Hindi & English)";
        if (hasHindi) return "Hindi";
        if (hasEnglish) return "English";
        return "Unknown / Other Language";
    }
});