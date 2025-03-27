async function checkSpeed() {
    let url = document.getElementById("websiteUrl").value;
    if (!url) {
        alert("Please enter a valid website URL.");
        return;
    }

    document.getElementById("results").classList.add("d-none");

    try {
        let apiKey = "AIzaSyDDR0RipmnTkBI2AKhilPV5OlaBWrX4noQ"; 
        
        let fetchData = async (strategy) => {
            let apiUrl = `https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=${encodeURIComponent(url)}&key=${apiKey}&strategy=${strategy}`;
            let response = await fetch(apiUrl);
            return response.json();
        };

        let mobileData = await fetchData("mobile");
        let desktopData = await fetchData("desktop");

        function getMetric(data, metric) {
            return (data.lighthouseResult.audits[metric].numericValue / 1000).toFixed(2);
        }

        function getScore(data) {
            return (data.lighthouseResult.categories.performance.score * 100);
        }

        // Mobile Data
        document.getElementById("mobileScore").innerHTML = getScore(mobileData) + "%";
        document.getElementById("mobileLCP").innerHTML = getMetric(mobileData, "largest-contentful-paint") + " sec";
        document.getElementById("mobileFCP").innerHTML = getMetric(mobileData, "first-contentful-paint") + " sec";
        document.getElementById("mobileTBT").innerHTML = getMetric(mobileData, "total-blocking-time") + " ms";
        document.getElementById("mobileCLS").innerHTML = mobileData.lighthouseResult.audits["cumulative-layout-shift"].displayValue;

        // Desktop Data
        document.getElementById("desktopScore").innerHTML = getScore(desktopData) + "%";
        document.getElementById("desktopLCP").innerHTML = getMetric(desktopData, "largest-contentful-paint") + " sec";
        document.getElementById("desktopFCP").innerHTML = getMetric(desktopData, "first-contentful-paint") + " sec";
        document.getElementById("desktopTBT").innerHTML = getMetric(desktopData, "total-blocking-time") + " ms";
        document.getElementById("desktopCLS").innerHTML = desktopData.lighthouseResult.audits["cumulative-layout-shift"].displayValue;

        // Recommendations
        let recList = document.getElementById("recommendations");
        recList.innerHTML = "";
        if (getScore(mobileData) < 80 || getScore(desktopData) < 80) recList.innerHTML += `<li>Enable caching & reduce server response time.</li>`;
        if (getMetric(mobileData, "largest-contentful-paint") > 3 || getMetric(desktopData, "largest-contentful-paint") > 3) recList.innerHTML += `<li>Optimize images & remove render-blocking resources.</li>`;
        if (getScore(mobileData) < 50 || getScore(desktopData) < 50) recList.innerHTML += `<li>Minify JS & CSS, use lazy loading for images.</li>`;

        document.getElementById("results").classList.remove("d-none");

    } catch (error) {
        alert("Failed to fetch website data. Please check the URL and try again.");
    }
}