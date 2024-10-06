<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #121212;
                color: #e0e0e0;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .container {
                text-align: center;
                padding: 2rem;
                background: #1e1e1e;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            }
            h1 {
                font-size: 2.5rem;
                margin-bottom: 1rem;
            }
            p {
                font-size: 1.25rem;
                margin-bottom: 2rem;
            }
            a {
                display: inline-block;
                padding: 0.75rem 1.5rem;
                font-size: 1rem;
                color: white;
                background-color: #ff2d20;
                border-radius: 4px;
                text-decoration: none;
                transition: background-color 0.3s;
                margin: 0.5rem;
            }
            a:hover {
                background-color: #e0261b;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Welcome to Countries Visited</h1>
            <p>A map to show off what countries in the world you've been to!</p>
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        </div>
    </body>
</html>