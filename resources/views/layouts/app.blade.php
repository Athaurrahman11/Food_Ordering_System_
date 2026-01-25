<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FoodieDash | Responsive Food Delivery</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <style>
        :root {
            --brand: #e06d4d;
            --bg: #fefcfb;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg);
            overflow-x: hidden;
        }

        /* Brand Colors & Buttons */
        .text-brand { color: var(--brand) !important; }
        .bg-brand { background-color: var(--brand) !important; color: white; }
        .btn-brand {
            background-color: var(--brand);
            color: white;
            border: none;
            font-weight: 700;
            border-radius: 50px;
            transition: 0.3s;
        }
        .btn-brand:hover { opacity: 0.9; transform: translateY(-1px); }

        /* Floating Category Bar Styles */
        .btn-light-custom {
            background-color: #f8f5f2;
            color: #4a4a4a;
            border-color: #eee9e4 !important;
            transition: 0.2s;
        }
        .btn-light-custom:hover {
            background-color: #eee9e4;
            color: #000;
        }

        /* Hero Banner */
        .hero-banner {
            min-height: 400px;
            height: auto;
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=1200');
            background-size: cover;
            background-position: center;
        }

        /* Layout Utilities */
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        .rounded-3xl { border-radius: 1.5rem !important; }

        /* Overlap effect for the category bar under the hero image */
        .mt-n4 { margin-top: -30px !important; }

        /* Desktop Adjustments */
        @media (min-width: 768px) {
            .hero-banner { min-height: 550px; }
            .rounded-3xl { border-radius: 3rem !important; }
            .mt-n4 { margin-top: -45px !important; }
        }

        /* Custom Colors */
        :root {
            --brand: #e06d4d;
            --brand-light: rgba(224, 109, 77, 0.1);
            --bg-soft: #fcf9f6;
        }

        .bg-brand-light { background-color: var(--brand-light); }

        /* Category Bar Button Styling */
        .btn-light-custom {
            background-color: #f8f5f2;
            color: #444;
            transition: 0.3s;
        }

        /* Negative Margin to pull bar up */
        .mt-n4 { margin-top: -35px !important; }

        /* Hide horizontal scrollbar but keep functionality */
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        /* Glass Search Background */
        .glass-search {
            background: rgba(0, 0, 0, 0.45);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
        }

        /* Footer specific styles */
    .social-icon {
        width: 36px;
        height: 36px;
        background-color: #f3eeea;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4a4a4a;
        transition: 0.3s;
        text-decoration: none;
    }

    .social-icon:hover {
        background-color: var(--brand);
        color: white;
    }

    .footer-link:hover {
        color: var(--brand) !important;
    }

    /* Custom shadow for the email input */
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(224, 109, 77, 0.1);
    }
    </style>
</head>
<body>
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
