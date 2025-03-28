<?php
// API Key (Free API Key Alpha Vantage se le lo)
$api_key = "YOUR_API_KEY";
$symbol = "AAPL"; // Yahan aap koi bhi stock ka ticker symbol daal sakte hain
$interval = "5min"; // Time frame: 1min, 5min, 15min, 1day
//$url = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=$symbol&interval=$interval&apikey=$api_key";
$url = "https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=IBM&interval=5min&apikey=demo";
// API se data fetch karna
$response = file_get_contents($url);
$data = json_decode($response, true);

// Agar data mila to process karo
if (isset($data["Time Series ($interval)"])) {
    $prices = $data["Time Series ($interval)"];
    $candles = [];

    // Candlestick data ko extract karna
    foreach ($prices as $time => $values) {
        $candles[] = [
            "time" => $time,
            "open" => (float) $values["1. open"],
            "high" => (float) $values["2. high"],
            "low" => (float) $values["3. low"],
            "close" => (float) $values["4. close"],
        ];
    }

    // Double Top & Double Bottom detect karna
    function detectPatterns($candles) {
        $signals = [];
        for ($i = 2; $i < count($candles) - 2; $i++) {
            $prev1 = $candles[$i - 1];
            $current = $candles[$i];
            $next1 = $candles[$i + 1];

            // Double Top Condition (Previous High ≈ Current High and then Drop)
            if ($prev1["high"] < $current["high"] && $next1["high"] < $current["high"]) {
                $signals[] = ["time" => $current["time"], "pattern" => "Double Top"];
            }

            // Double Bottom Condition (Previous Low ≈ Current Low and then Rise)
            if ($prev1["low"] > $current["low"] && $next1["low"] > $current["low"]) {
                $signals[] = ["time" => $current["time"], "pattern" => "Double Bottom"];
            }
        }
        return $signals;
    }

    $signals = detectPatterns($candles);

    // Response JSON format me return karna
    echo json_encode(["candles" => $candles, "signals" => $signals]);
} else {
    echo json_encode(["error" => "Data not found"]);
}
?>
