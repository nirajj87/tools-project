$(document).ready(function () {
    $("#calculateBtn").click(function () {
        let price = parseFloat($("#originalPrice").val());
        let rate = parseFloat($("#gstRate").val());

        if (!price || price <= 0) {
            alert("Please enter a valid original price.");
            return;
        }

        // GST Calculation
        let gstAmount = (price * rate) / 100;
        let finalPrice = price + gstAmount;
        let cgst = gstAmount / 2;
        let sgst = gstAmount / 2;

        // Display Results
        $("#gstAmount").text(gstAmount.toFixed(2));
        $("#finalPrice").text(finalPrice.toFixed(2));
        $("#cgst").text(cgst.toFixed(2));
        $("#sgst").text(sgst.toFixed(2));
        $("#result").removeClass("hidden");
    });
});