<!DOCTYPE html>
<html lang="en">
<!-- TEST 1: GitHub to cPanel deployment -->
<!-- TEST 2: GitHub to cPanel deployment -->
<!-- TEST 2: GitHub to cPanel deployment -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <title>Laboratory & Diagnostic Results</title>

    <link rel="stylesheet" type="text/css" href="css/index.css">
    <style>
       
    </style>
</head>

<body>

<header class="header">

    <div class="logo">
        <img src="images/logo.png" alt="Hospital Logo" class="hospital-logo" height="50px" width="200px">
        <!-- <div class="logo-icon"></div> -->

        <!-- <div class="logo-text">
            <strong>ST. VINCENT/strong>
            <span>GENERAL HOSPITAL</span>
        </div> -->
    </div>

    <nav class="nav">
        <a href="#">Home</a>
        <a href="#">Home</a>
        <a href="#">Home</a>
        <a href="#">Home</a>
    </nav>

</header>


<main class="main">

    <!-- LEFT SIDE -->
    <section class="left">

        <h1 class="title">
            Check your laboratory<br>
            &amp; diagnostic results<br>
            online! 
        </h1>

        <div class="red-line"></div>

        <div class="subtitle">
            Provide the required credentials below:
        </div>

        <form method="POST" action="login.php" class="form">

            <input
                type="text"
                name="admission_number"
                class="field"
                placeholder="Admission Number or Patient ID"
            >

            <div class="error">
                </div>

            <input
                type="text"
                name="last_name"
                class="field"
                placeholder="Patient's Last Name"
            >

            <div class="error">
               </div>


            <div class="captcha">
                <div class="captcha-box"></div>

                <div class="captcha-text">
                    I'm not a robot
                </div>

                <div class="captcha-logo">
                    ↻<br>
                    <small>CAPTCHA</small>
                </div>
            </div>


            <button type="submit" class="submit">
                SUBMIT
            </button>

                <div class="demo-message"> </div>
            
        </form>

    </section>


    <!-- RIGHT SIDE -->
     <section class="right">

        <div class="instructions">
            Instructions:
        </div>

        <div class="instruction-card">

            <div class="instruction-title">
                Input the admission number<br>
                and the patient's family name<br>
                found on your Official Receipt.
            </div>


            <div class="sample-receipt">

                <div class="receipt-header">
                    <div class="receipt-logo">
                        MEDCARE<br>
                        MEDICAL CENTER
                    </div>

                    <div>
                        Official Receipt<br>
                        <span class="receipt-no">000000</span>
                    </div>
                </div>

                <div>
                    Patient Name:
                    <strong>DEMO PATIENT</strong>
                </div>

                <div style="margin-top:12px;">
                    Admission No:
                    <strong>012345</strong>
                </div>

                <div class="receipt-highlight name-highlight"></div>
                <div class="receipt-highlight number-highlight"></div>

                <div class="locate">
                    Locate Here
                </div>

            </div>

            <div class="note">
                <strong>Demo:</strong> This sample receipt is for
                interface demonstration only.
            </div>

        </div>

    </section>

</main>

</body>
</html>
