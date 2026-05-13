<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- =============== Stylish Success Popup =============== -->
@if(session('success'))
<div id="popup-overlay">
    <div id="success-popup">
        <h2>Success</h2>
        <p>{{ session('success') }}</p>
        <button onclick="closePopup()">OK</button>
    </div>
</div>
@endif

<style>
    /* Background Blur Overlay */
    #popup-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(6px);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        animation: fadeIn 0.3s ease;
    }

    /* Popup Box */
    #success-popup {
        background: white;
        padding: 30px;
        width: 350px;
        border-radius: 16px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        animation: popupScale 0.3s ease;
        font-family: Arial, sans-serif;
    }

    #success-popup h2 {
        color: #28a745;
        margin-bottom: 10px;
    }

    #success-popup p {
        color: #444;
        margin-bottom: 20px;
        font-size: 16px;
    }

    #success-popup button {
        background: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
        transition: 0.3s;
    }

    #success-popup button:hover {
        background: #218838;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes popupScale {
        from {
            transform: scale(0.8);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }
</style>

<script>
    function closePopup() {
        const overlay = document.getElementById('popup-overlay');

        overlay.style.opacity = '0';
        overlay.style.transition = '0.3s';

        setTimeout(() => {
            overlay.remove();
        }, 300);
    }
</script>

<!-- =============== End of Stylish Success Popup =============== -->
        </div>
    </body>
</html>
