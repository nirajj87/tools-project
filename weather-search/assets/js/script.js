async function getCurrentLocationWeather() {
    navigator.geolocation.getCurrentPosition(async (position) => {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;
        getWeatherByCoords(lat, lon);
    }, () => showError("Location access denied. Enter city manually."));
}

async function getWeatherByCoords(lat, lon) {
    const apiKey = "c275dbbf08578c2dc8ff29e28a327f00";
    try {
        const response = await axios.get(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`);
        updateWeatherUI(response.data);
    } catch (error) {
        showError("Unable to fetch weather for your location.");
    }
}

async function getWeather(city = '') {
    const apiKey = "c275dbbf08578c2dc8ff29e28a327f00";
    if (!city) city = document.getElementById("city").value;

    document.getElementById("error-message").classList.add("hidden");

    if (!city) {
        showError("Please enter a city name");
        return;
    }

    try {
        const response = await axios.get(`https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`);
        updateWeatherUI(response.data);
    } catch (error) {
        showError("City not found! Please enter a valid city.");
    }
}

function updateWeatherUI(data) {
    let cityDetails = `${data.name}`;
    if (data.sys && data.sys.country) {
        cityDetails += `, ${data.sys.country}`;
    }

    document.getElementById("cityName").textContent = cityDetails;
    document.getElementById("temperature").textContent = `${data.main.temp}°C`;
    document.getElementById("weatherDesc").textContent = data.weather[0].description;
    document.getElementById("humidity").textContent = `${data.main.humidity}%`;
    document.getElementById("windSpeed").textContent = `${data.wind.speed} km/h`;
    document.getElementById("sunrise").textContent = new Date(data.sys.sunrise * 1000).toLocaleTimeString();
    document.getElementById("sunset").textContent = new Date(data.sys.sunset * 1000).toLocaleTimeString();
    document.getElementById("dateTime").textContent = new Date().toLocaleString();

    document.getElementById("weather-icon").src = `https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
    document.getElementById("weather-info").classList.remove("hidden");

    changeBackground(data.weather[0].main);
    updateDescription(data.weather[0].main);
}

function changeBackground(weather) {
    let weatherImages = {
        "Clear": "https://images.pexels.com/photos/531756/pexels-photo-531756.jpeg",
        "Clouds": "https://images.pexels.com/photos/158163/clouds-cloudporn-weather-lookup-158163.jpeg",
        "Rain": "https://images.pexels.com/photos/459451/pexels-photo-459451.jpeg",
        "Snow": "https://images.pexels.com/photos/326119/pexels-photo-326119.jpeg",
        "Thunderstorm": "https://images.pexels.com/photos/1162251/pexels-photo-1162251.jpeg",
        "Drizzle": "https://images.pexels.com/photos/110874/pexels-photo-110874.jpeg",
        "Mist": "https://images.pexels.com/photos/360912/pexels-photo-360912.jpeg"
    };

    let imageUrl = weatherImages[weather] || weatherImages["Clear"];
    document.body.style.backgroundImage = `url(${imageUrl})`;
}

function updateDescription(weather) {
    let descriptions = {
        "Clear": "It's a bright and sunny day!",
        "Clouds": "The sky is cloudy today.",
        "Rain": "It's raining! Carry an umbrella.",
        "Snow": "Snowfall is here! Stay warm.",
        "Thunderstorm": "A thunderstorm is approaching.",
        "Drizzle": "Light drizzle outside!",
        "Mist": "Misty weather today!"
    };

    document.getElementById("weather-description").textContent = descriptions[weather] || "Enjoy your day!";
}

function showError(message) {
    const errorBox = document.getElementById("error-message");
    errorBox.textContent = message;
    errorBox.classList.remove("hidden");
}

window.onload = getCurrentLocationWeather;