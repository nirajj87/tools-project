<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CHLYCVS9S7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CHLYCVS9S7');
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="assets/css/styles.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"></script>
    <script src="assets/js/script.js"></script>
    
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-900 text-white">
    
    <div id="weather-container" class="p-8 rounded-xl shadow-lg text-center w-96 bg-gray-800 bg-opacity-90">
        <h1 class="text-2xl font-bold">Weather App</h1>
        <input id="city" type="text" placeholder="Enter city" class="mt-4 p-2 w-full rounded bg-gray-700 text-white text-center" />
        <button onclick="getWeather()" class="mt-2 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded glow-button">Search</button>
        
        <div id="error-message" class="mt-2 text-red-500 hidden"></div>

        <div id="weather-info" class="mt-4 hidden">
            <img id="weather-icon" class="mx-auto w-24 h-24" />
            <h2 id="cityName" class="text-xl font-semibold"></h2>
            <p id="dateTime" class="text-sm opacity-80"></p>

            <table class="w-full mt-4 border border-white text-sm">
                <tr><td class="border px-2 py-1">Temperature</td><td class="border px-2 py-1" id="temperature"></td></tr>
                <tr><td class="border px-2 py-1">Weather</td><td class="border px-2 py-1" id="weatherDesc"></td></tr>
                <tr><td class="border px-2 py-1">Humidity</td><td class="border px-2 py-1" id="humidity"></td></tr>
                <tr><td class="border px-2 py-1">Wind Speed</td><td class="border px-2 py-1" id="windSpeed"></td></tr>
                <tr><td class="border px-2 py-1">Sunrise</td><td class="border px-2 py-1" id="sunrise"></td></tr>
                <tr><td class="border px-2 py-1">Sunset</td><td class="border px-2 py-1" id="sunset"></td></tr>
            </table>

            <div id="weather-description" class="mt-4 text-sm text-yellow-300 font-semibold"></div>
        </div>
    </div>
</body>
</html>
