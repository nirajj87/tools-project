<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function calculateAdditionalShares($buy_price, $buy_shares, $current_price, $target_price) {
        $current_investment = $buy_shares * $buy_price;
        $additional_shares = ($current_investment - ($target_price * $buy_shares)) / ($target_price - $current_price);
        $additional_shares = ceil($additional_shares);
        $total_cost = $additional_shares * $current_price;

        return [
            'additional_shares' => $additional_shares,
            'total_cost' => $total_cost
        ];
    }

    $buy_price = $_POST['buy_price'];
    $buy_shares = $_POST['buy_shares'];
    $current_price = $_POST['current_price'];
    $target_price = $_POST['target_price'];

    $result = calculateAdditionalShares($buy_price, $buy_shares, $current_price, $target_price);

    echo json_encode($result);
}
?>
