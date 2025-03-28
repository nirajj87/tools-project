<?php
header('Content-Type: application/json');

// Enable error logging, suppress display
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

// API keys
$xBearerToken = 'AAAAAAAAAAAAAAAAAAAAAN980AEAAAAAeBibYvnyYUGlr1iwYRT3G%2B3qsHo%3DyrZeYXb6rfui5qIVW0lUEXH58lYDUl0N4ntiFWkVwLn9QMLgVr';
$alphaVantageKey = 'XR5T4CBNRUEKEF4L';

//echo "Starting script execution...\n";

// Simple file-based cache
function getCachedData($key) {
   // echo "Checking cache for key: $key\n";
    $cacheFile = "cache1/$key.json";
    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < 3600) {
      //  echo "Cache hit for $key\n";
        return json_decode(file_get_contents($cacheFile), true);
    }
  //  echo "Cache miss for $key\n";
    return null;
}

function setCachedData($key, $data) {
  //  echo "Setting cache for key: $key\n";
    $cacheDir = "cache2";
    if (!is_dir($cacheDir)) mkdir($cacheDir, 0777, true);
    $cacheFile = "$cacheDir/$key.json";
    file_put_contents($cacheFile, json_encode($data));
   // echo "Cache set for $key\n";
}

// Fetch trending stocks from X
function fetchTrendingStocksFromX($bearerToken) {
    $stockTweetCounts = [];
    $query = "stock lang:en -is:retweet"; // "stock" word wale tweets fetch karne ke liye
    $url = "https://api.twitter.com/2/tweets/search/recent?query=" . urlencode($query) . "&tweet.fields=created_at&max_results=100";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Bearer $bearerToken"]);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        error_log("X API cURL Error: " . curl_error($ch));
        curl_close($ch);
        return [];
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo $ch;
    print_r($response);die;
    if ($httpCode !== 200) {
        error_log("X API HTTP Error: Code $httpCode - Response: $response");
        return [];
    }

    $data = json_decode($response, true);
    if (!isset($data['data'])) {
        error_log("X API Error: Invalid response - $response");
        return [];
    }

    // **Extract stock symbols from tweets**
    foreach ($data['data'] as $tweet) {
        preg_match_all('/\b[A-Z]{2,5}\b/', $tweet['text'], $matches); // Match 2-5 letter uppercase stock symbols
        foreach ($matches[0] as $stock) {
            if (!isset($stockTweetCounts[$stock])) {
                $stockTweetCounts[$stock] = 0;
            }
            $stockTweetCounts[$stock]++;
        }
    }

    // **Sort by most mentioned stocks**
    arsort($stockTweetCounts);

    // **Return top 5 trending stocks**
    return array_slice(array_keys($stockTweetCounts), 0, 5);
}



// Fetch market data from Alpha Vantage
function fetchMarketData($stockSymbol, $apiKey) {
   // echo "Fetching market data for $stockSymbol...\n";
    $cacheKey = "av_daily_$stockSymbol";
    $cached = getCachedData($cacheKey);
    if ($cached !== null) {
       // echo "Using cached market data for $stockSymbol\n";
        return $cached;
    }

    $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=$stockSymbol&apikey=$apiKey";
   // echo "Alpha Vantage Global Quote URL: $url\n";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $error = curl_error($ch);
      //  echo "Alpha Vantage Global Quote cURL Error for $stockSymbol: $error\n";
        error_log("Alpha Vantage Global Quote cURL Error for $stockSymbol: $error");
        curl_close($ch);
        return null;
    }
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //echo "Alpha Vantage Global Quote HTTP Code for $stockSymbol: $httpCode\n";
    curl_close($ch);

    if ($httpCode !== 200) {
    //    echo "Alpha Vantage Global Quote HTTP Error for $stockSymbol: Code $httpCode - Response: $response\n";
        error_log("Alpha Vantage Global Quote HTTP Error for $stockSymbol: Code $httpCode - Response: $response");
        return null;
    }

    $data = json_decode($response, true);
    if (!isset($data['Global Quote'])) {
      //  echo "Alpha Vantage Global Quote Error for $stockSymbol: " . json_encode($data) . "\n";
        error_log("Alpha Vantage Global Quote Error for $stockSymbol: " . json_encode($data));
        return null;
    }

   // echo "Alpha Vantage Global Quote Data for $stockSymbol: " . json_encode($data) . "\n";
    $quote = $data['Global Quote'];

    $currentPrice = floatval($quote['05. price']);
    $lastClosing = floatval($quote['08. previous close']);
    $opening = floatval($quote['02. open']);
   // echo "Current Price: $currentPrice, Last Closing: $lastClosing, Opening: $opening\n";

    $ema10 = fetchEMA($stockSymbol, 10, $apiKey);
    sleep(1);
    $ema50 = fetchEMA($stockSymbol, 50, $apiKey);
    sleep(1);
  //  echo "EMA 10: $ema10, EMA 50: $ema50\n";

    $high = floatval($quote['03. high']);
    $low = floatval($quote['04. low']);
  //  echo "High: $high, Low: $low\n";

    $result = [
        'current_price' => $currentPrice,
        'last_closing' => $lastClosing,
        'opening' => $opening,
        'ema_10' => $ema10 ?? $currentPrice,
        'ema_50' => $ema50 ?? $currentPrice,
        'resistance' => [$high, $high, $high],
        'support' => [$low, $low, $low],
    ];

    setCachedData($cacheKey, $result);
   // echo "Market data for $stockSymbol: " . json_encode($result) . "\n";
    return $result;
}

function fetchEMA($stockSymbol, $period, $apiKey) {
   // echo "Fetching EMA for $stockSymbol (Period $period)...\n";
    $cacheKey = "av_ema_{$stockSymbol}_{$period}";
    $cached = getCachedData($cacheKey);
    if ($cached !== null) {
    //    echo "Using cached EMA for $stockSymbol (Period $period): $cached\n";
        return $cached;
    }

    $url = "https://www.alphavantage.co/query?function=EMA&symbol=$stockSymbol&interval=daily&time_period=$period&series_type=close&apikey=$apiKey";
   // echo "Alpha Vantage EMA URL: $url\n";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $error = curl_error($ch);
      //  echo "Alpha Vantage EMA cURL Error for $stockSymbol (Period $period): $error\n";
        error_log("Alpha Vantage EMA cURL Error for $stockSymbol (Period $period): $error");
        curl_close($ch);
        return null;
    }
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
   // echo "Alpha Vantage EMA HTTP Code for $stockSymbol (Period $period): $httpCode\n";
    curl_close($ch);

    if ($httpCode !== 200) {
     //   echo "Alpha Vantage EMA HTTP Error for $stockSymbol (Period $period): Code $httpCode - Response: $response\n";
        error_log("Alpha Vantage EMA HTTP Error for $stockSymbol (Period $period): Code $httpCode - Response: $response");
        return null;
    }

    $data = json_decode($response, true);
    if (!isset($data['Technical Analysis: EMA']) || empty($data['Technical Analysis: EMA'])) {
     //   echo "Alpha Vantage EMA Error for $stockSymbol (Period $period): " . json_encode($data) . "\n";
        error_log("Alpha Vantage EMA Error for $stockSymbol (Period $period): " . json_encode($data));
        return null;
    }

    $emaSeries = $data['Technical Analysis: EMA'];
    $ema = floatval(array_values($emaSeries)[0]['EMA']);
    //echo "EMA for $stockSymbol (Period $period): $ema\n";
    setCachedData($cacheKey, $ema);
    return $ema;
}

function applyTrendFollowing($stock, $marketData) {
   // echo "Applying Trend Following for {$stock['name']}...\n";
    $defaultData = [
        'current_price' => 0,
        'last_closing' => 0,
        'opening' => 0,
        'resistance' => [0, 0, 0],
        'support' => [0, 0, 0],
        'ema_10' => 0,
        'ema_50' => 0
    ];

    $marketData = $marketData ?? $defaultData;
   // echo "Market data used: " . json_encode($marketData) . "\n";

    $stock['current_price'] = $marketData['current_price'];
    $stock['last_closing'] = $marketData['last_closing'];
    $stock['opening'] = $marketData['opening'];
    $stock['resistance'] = $marketData['resistance'];
    $stock['support'] = $marketData['support'];

    $ema10 = $marketData['ema_10'];
    $ema50 = $marketData['ema_50'];
   // echo "EMA 10: $ema10, EMA 50: $ema50\n";

    $stock['trend'] = ($ema10 > $ema50) ? 'Upward' : 'Downward';
    $stock['strategy'] = 'Trend Following (10,50 EMA)';

    if ($stock['trend'] === 'Upward') {
        $stock['entry'] = $stock['current_price'];
        $stock['exit'] = $marketData['resistance'][2];
        $stock['stop_loss'] = $marketData['support'][0];
        $stock['position'] = 'Long';
    } else {
        $stock['entry'] = $stock['current_price'];
        $stock['exit'] = $marketData['support'][2];
        $stock['stop_loss'] = $marketData['resistance'][0];
        $stock['position'] = 'Short';
    }

   // echo "Processed stock: " . json_encode($stock) . "\n";
    return $stock;
}

function fallbackStocks() {
   // echo "Using fallback stocks...\n";
    return [
        ['name' => 'RELIANCE.BO', 'hashtag' => '#Reliance'],
        ['name' => 'TATAMOTORS.BO', 'hashtag' => '#TataMotors'],
        ['name' => 'INFY.BO', 'hashtag' => '#Infosys'],
        ['name' => 'ADANIGREEN.BO', 'hashtag' => '#AdaniGreen'],
        ['name' => 'HDFCBANK.BO', 'hashtag' => '#HDFCBank']
    ];
}

// Main logic
//echo "Starting main logic...\n";
$trendingStocks = fetchTrendingStocksFromX($xBearerToken);
//echo "Trending stocks fetched: " . json_encode($trendingStocks) . "\n";

$processedStocks = array_map(function($stock) use ($alphaVantageKey) {
   // echo "Processing stock: {$stock['name']}\n";
    $marketData = fetchMarketData($stock['name'], $alphaVantageKey);
    return applyTrendFollowing($stock, $marketData);
}, $trendingStocks);

//echo "Processed stocks before filtering: " . json_encode($processedStocks) . "\n";

// Remove null entries
$processedStocks = array_filter($processedStocks, fn($stock) => $stock !== null);
//echo "Processed stocks after filtering: " . json_encode($processedStocks) . "\n";

// Ensure 5 stocks by merging with fallback and processing them
if (count($processedStocks) < 5) {
  //  echo "Less than 5 stocks, merging with fallback...\n";
    $fallback = array_slice(fallbackStocks(), 0, 5 - count($processedStocks));
    $processedFallback = array_map(function($stock) use ($alphaVantageKey) {
     //   echo "Processing fallback stock: {$stock['name']}\n";
        $marketData = fetchMarketData($stock['name'], $alphaVantageKey);
        return applyTrendFollowing($stock, $marketData);
    }, $fallback);
    $processedStocks = array_merge($processedStocks, $processedFallback);
}

//echo "Final processed stocks: " . json_encode($processedStocks) . "\n";

echo json_encode(['stocks' => array_values($processedStocks)], JSON_PRETTY_PRINT);
?>