<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Why EasyGo is Budget Friendly</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    body {
        margin: 0;
        font-family: "Segoe UI", sans-serif;
        background: url('images/bg.jpg') center/cover no-repeat fixed;
    }

    /* Center Wrapper */
    .wrapper {
        display: flex;
        justify-content: center;
        padding: 40px 20px;
    }

    /* Main Glass Card */
    .glass-container {
        width: 90%;
        max-width: 900px;
        background: rgba(255, 255, 255, 0.25);
        border: 1px solid rgba(255, 255, 255, 0.45);
        backdrop-filter: blur(16px);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.25);
        animation: fadeUp 0.6s ease;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Title */
    .title {
        text-align: center;
        font-size: 32px;
        color: #ff5722;
        font-weight: 800;
        margin-bottom: 20px;
    }

    /* Sections */
    .feature {
        background: rgba(255, 255, 255, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.3);
        padding: 20px;
        border-radius: 16px;
        margin-bottom: 18px;
        backdrop-filter: blur(12px);
        transition: 0.3s;
    }

    .feature:hover {
        transform: translateY(-6px);
        background: rgba(255, 255, 255, 0.55);
    }

    .feature h3 {
        margin: 0 0 10px 0;
        color: #ff7043;
        font-size: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .feature p {
        margin: 0;
        line-height: 1.6;
        color: #333;
    }
</style>
</head>

<body>

<div class="wrapper">
    <div class="glass-container">

        <h2 class="title">Why EasyGo Is Budget Friendly</h2>

        <!-- Feature 1 -->
        <div class="feature">
            <h3><i class="fa-solid fa-coins"></i> Real-Time Price Comparison</h3>
            <p>
                EasyGo compares rates across multiple hotel and travel partners instantly.
                You always see the cheapest available price without searching multiple websites.
            </p>
        </div>

        <!-- Feature 2 -->
        <div class="feature">
            <h3><i class="fa-solid fa-receipt"></i> No Hidden Charges</h3>
            <p>
                We never add extra booking charges or hidden taxes.  
                The price displayed is always the final amount you pay.
            </p>
        </div>

        <!-- Feature 3 -->
        <div class="feature">
            <h3><i class="fa-solid fa-tags"></i> Special Discounts & Offers</h3>
            <p>
                EasyGo provides exclusive partner-hotel discounts, seasonal offers,
                and loyalty savings so your travel costs stay low.
            </p>
        </div>

        <!-- Feature 4 -->
        <div class="feature">
            <h3><i class="fa-solid fa-lightbulb"></i> Smart Budget Recommendations</h3>
            <p>
                Hotels are grouped into Low, Medium, and High budget categories —
                letting you instantly pick the option that fits your wallet.
            </p>
        </div>

        <!-- Feature 5 -->
        <div class="feature">
            <h3><i class="fa-solid fa-wallet"></i> Pays Less, Travels More</h3>
            <p>
                Our platform optimizes every search to highlight money-saving options,
                helping travelers get the best value for their budget.
            </p>
        </div>

    </div>
</div>

</body>
</html>
