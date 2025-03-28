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
    <meta name="description" content="Calculate your exact age in years, months, days, hours, minutes, and seconds using this accurate age calculator.">
    <meta name="keywords" content="Age Calculator, Birth Date Calculator, Age in Seconds, Online Age Calculator">
    <title>Age Calculator</title>
    
    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- jQuery & jQuery UI for Date-Time Picker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
    
    <!-- Custom Styles -->
    <style>
        body { background-color: #f8f9fa; }
        .container { max-width: 600px; }
        #ageResult span { font-weight: bold; }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="bg-primary text-white text-center py-3 shadow-sm">
        <h1 class="fs-3"><i class="fas fa-birthday-cake"></i> Age Calculator</h1>
        <p class="fs-6">Find your exact age in seconds!</p>
    </header>

    <!-- Main Content -->
    <main class="container bg-white p-4 mt-4 rounded shadow-sm">
        <h2 class="text-center mb-3">Enter Your Date & Time of Birth</h2>

        <!-- Date & Time Input -->
        <div class="mb-3">
            <label for="dob" class="form-label"><i class="fas fa-calendar-alt"></i> Select Date & Time:</label>
            <input type="text" id="dob" class="form-control" placeholder="Pick your birth date & time">
        </div>

        <!-- Calculate Age Button -->
        <button id="calculateAge" class="btn btn-primary w-100"><i class="fas fa-calculator"></i> Calculate Age</button>

        <!-- Age Result Display -->
        <div class="mt-3 p-3 bg-light rounded" id="ageResult">
            <p>Your Age: <span id="years">0</span> Years, <span id="months">0</span> Months, <span id="days">0</span> Days, 
                <span id="hours">0</span> Hours, <span id="minutes">0</span> Minutes, <span id="seconds">0</span> Seconds</p>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">
                        <i class="fas fa-globe me-2"></i><a href="https://www.devsupport.co.in" class="text-white text-decoration-none">www.devsupport.co.in</a>
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">© 2025 Devsupport.co.in. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery, DateTime Picker, & Script for Age Calculation -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/script.js"></script>
   

</body>
</html>
