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

    
    <style>
        :root {
    --navy: #13283e;
    --red: #bd1e2d;
    --red-dark: #981521;
    --blue-soft: #eef5fb;
    --text: #1d2d3d;
    --muted: #64748b;
    --line: #dce5ee;
    --white: #ffffff;
    --shadow: 0 20px 55px rgba(15, 40, 63, 0.12);
}

* {
    box-sizing: border-box;
}

body {
    margin: 0;
    min-height: 100vh;
    color: var(--text);
    font-family: "Segoe UI", Arial, sans-serif;
    background:
        radial-gradient(circle at top left, rgba(189, 30, 45, 0.08), transparent 32%),
        linear-gradient(135deg, #f8fbfd, var(--blue-soft));
}

.header {
    width: min(1180px, calc(100% - 40px));
    min-height: 82px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
}

.logo {
    display: flex;
    align-items: center;
}

.hospital-logo {
    width: auto;
    max-width: 220px;
    height: 54px;
    object-fit: contain;
}

.nav {
    display: flex;
    align-items: center;
    gap: 24px;
}

.nav a {
    color: var(--navy);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.94rem;
}

.nav a:hover {
    color: var(--red);
}

.main {
    width: min(1180px, calc(100% - 40px));
    min-height: calc(100vh - 82px);
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 440px;
    align-items: center;
    gap: 80px;
    padding: 52px 0 72px;
}

.left {
    max-width: 580px;
}

.title {
    margin: 0;
    color: var(--navy);
    font-size: clamp(2.5rem, 5vw, 4.4rem);
    line-height: 1.08;
    letter-spacing: -0.045em;
}

.red-line {
    width: 72px;
    height: 5px;
    margin: 26px 0;
    border-radius: 10px;
    background: var(--red);
}

.subtitle {
    margin-bottom: 28px;
    color: var(--muted);
    font-size: 1.06rem;
    line-height: 1.6;
}

.form {
    padding: 32px;
    border: 1px solid rgba(220, 229, 238, 0.9);
    border-radius: 24px;
    background: var(--white);
    box-shadow: var(--shadow);
}

.field {
    width: 100%;
    height: 56px;
    margin-bottom: 14px;
    padding: 0 17px;
    border: 1px solid var(--line);
    border-radius: 12px;
    outline: none;
    color: var(--text);
    background: #fbfdff;
    font: inherit;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.field::placeholder {
    color: #94a3b8;
}

.field:focus {
    border-color: var(--red);
    box-shadow: 0 0 0 4px rgba(189, 30, 45, 0.12);
    background: var(--white);
}

.captcha {
    min-height: 74px;
    margin: 10px 0 22px;
    padding: 14px;
    display: flex;
    align-items: center;
    gap: 13px;
    border: 1px solid var(--line);
    border-radius: 12px;
    background: #f8fafc;
    color: var(--text);
}

.captcha-box {
    width: 24px;
    height: 24px;
    flex: 0 0 24px;
    border: 2px solid #9aa9b7;
    border-radius: 4px;
    background: var(--white);
}

.captcha-text {
    font-size: 0.95rem;
}

.captcha-logo {
    margin-left: auto;
    color: #718096;
    text-align: center;
    font-size: 1.55rem;
    line-height: 0.85;
}

.captcha-logo small {
    font-size: 0.46rem;
    font-weight: 700;
}

.submit {
    width: 100%;
    min-height: 55px;
    border: 0;
    border-radius: 12px;
    cursor: pointer;
    color: var(--white);
    background: var(--red);
    box-shadow: 0 10px 22px rgba(189, 30, 45, 0.24);
    font-size: 0.94rem;
    font-weight: 800;
    letter-spacing: 0.08em;
    transition: transform 0.2s, background 0.2s;
}

.submit:hover {
    transform: translateY(-2px);
    background: var(--red-dark);
}

.error,
.demo-message {
    margin: -6px 0 14px;
    color: var(--red);
    font-size: 0.84rem;
}

.demo-message {
    margin: 18px 0 0;
    padding: 12px 14px;
    border-radius: 10px;
    color: #965b00;
    background: #fff8df;
    line-height: 1.45;
}

@media (max-width: 850px) {
    .main {
        grid-template-columns: 1fr;
        gap: 36px;
        padding-top: 32px;
    }

    .left {
        max-width: 640px;
    }
}

@media (max-width: 580px) {
    .header,
    .main {
        width: min(100% - 28px, 1180px);
    }

    .header {
        min-height: 72px;
    }

    .hospital-logo {
        max-width: 170px;
        height: 44px;
    }

    .nav {
        display: none;
    }

    .main {
        padding: 28px 0 48px;
    }

    .title {
        font-size: 2.45rem;
    }

    .form {
        padding: 22px;
        border-radius: 18px;
    }
}
    </style>
</head>

<body>

<header class="header">

    <div class="logo">
        <img src="/images/logos.png" alt="Hospital Logo" class="hospital-logo" height="50px" width="200px">
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

                <div class="demo-message">
                    Please enter the required information.                </div>
            
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
