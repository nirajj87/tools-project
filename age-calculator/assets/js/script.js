$(document).ready(function () {
    // Initialize Date-Time Picker
    $('#dob').datetimepicker({
        format: 'Y-m-d H:i:s',
        timepicker: true,
        yearStart: 1900,
        yearEnd: new Date().getFullYear(),
        scrollMonth: false,
        scrollInput: false
    });

    // Calculate Age
    $("#calculateAge").click(function () {
        let dob = $("#dob").val();
        if (dob === "") {
            alert("Please select your date and time of birth.");
            return;
        }

        let birthDate = new Date(dob);
        let now = new Date();

        // Calculate Age Components
        let diff = now - birthDate;
        let years = now.getFullYear() - birthDate.getFullYear();
        let months = now.getMonth() - birthDate.getMonth();
        let days = now.getDate() - birthDate.getDate();
        let hours = now.getHours() - birthDate.getHours();
        let minutes = now.getMinutes() - birthDate.getMinutes();
        let seconds = now.getSeconds() - birthDate.getSeconds();

        if (months < 0) { years--; months += 12; }
        if (days < 0) { months--; days += new Date(now.getFullYear(), now.getMonth(), 0).getDate(); }
        if (hours < 0) { days--; hours += 24; }
        if (minutes < 0) { hours--; minutes += 60; }
        if (seconds < 0) { minutes--; seconds += 60; }

        // Display Age
        $("#years").text(years);
        $("#months").text(months);
        $("#days").text(days);
        $("#hours").text(hours);
        $("#minutes").text(minutes);
        $("#seconds").text(seconds);
    });
});