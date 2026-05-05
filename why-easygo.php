<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Why EasyGo?</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    body {
        margin: 0;
        font-family: "Segoe UI", sans-serif;
        background: url('images/bg.jpg') center/cover no-repeat fixed;
    }

    /* CENTER WRAPPER */
    .wrapper {
        display: flex;
        justify-content: center;
        padding: 40px 20px;
    }

    /* MAIN GLASS CARD */
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

    .title {
        text-align: center;
        font-size: 32px;
        color: #ff5722;
        font-weight: 800;
        margin-bottom: 20px;
    }

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

        <h2 class="title">Why Choose EasyGo?</h2>

        <!-- FEATURE 1 -->
        <div class="feature">
            <h3><i class="fa-solid fa-bolt"></i> Fast & Smooth Experience</h3>
            <p>
                EasyGo loads pages instantly with an ultra-optimized travel system,
                offering seamless navigation and quick access to hotels and places.
            </p>
        </div>

        <!-- FEATURE 2 -->
        <div class="feature">
            <h3><i class="fa-solid fa-globe"></i> Explore 18+ Global Destinations</h3>
            <p>
                Discover popular countries, cities, and tourist attractions from around the world 
                with curated lists and verified data.
            </p>
        </div>

        <!-- FEATURE 3 -->
        <div class="feature">
            <h3><i class="fa-solid fa-hotel"></i> Verified Hotels & Ratings</h3>
            <p>
                Every hotel is listed with genuine ratings, budget categories,
                and clear pricing to help you book confidently.
            </p>
        </div>

        <!-- FEATURE 4 -->
        <div class="feature">
            <h3><i class="fa-solid fa-gift"></i> Personalized Suggestions</h3>
            <p>
                Based on your browsing and wishlist, EasyGo shows tailored recommendations 
                so you always find the best stay options.
            </p>
        </div>

        <!-- FEATURE 5 -->
        <div class="feature">
            <h3><i class="fa-solid fa-wallet"></i> Budget-Friendly Choices</h3>
            <p>
                Our smart filters and automatic price comparison ensure you always pay less
                while getting more.
            </p>
        </div>

    </div>
</div>

</body>
</html>
