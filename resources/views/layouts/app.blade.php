<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'TastyBites') }}</title>

    {{-- Bootstrap & Fonts --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #fffaf7;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main { flex: 1; }

        /* Navbar */
        .navbar {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .navbar-brand {
            font-weight: 700;
            color: #e67e22 !important;
            font-size: 1.5rem;
        }

        /* Hero section */
        .hero {
            background: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1200&q=80') center/cover no-repeat;
            color: #fff;
            text-shadow: 0 2px 5px rgba(0,0,0,0.6);
            padding: 100px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
        }
        .hero p {
            font-size: 1.2rem;
        }

        /* Recipe Cards */
        .recipe-card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .recipe-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .recipe-card img {
            height: 220px;
            object-fit: cover;
            width: 100%;
        }
        .recipe-card .card-body {
            background: #fff;
        }
        .recipe-card .btn {
            border-radius: 50px;
        }

        footer {
            background: #2d2d2d;
            color: #ccc;
            padding: 20px 0;
            text-align: center;
            margin-top: 40px;
        }
        footer a {
            color: #e67e22;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('recipes.index') }}">
                🍽️ TastyBites
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="{{ route('recipes.index') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('recipes.create') }}" class="nav-link">Add Recipe</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <p>&copy; {{ date('Y') }} <strong>TastyBites</strong> – Made with ❤️ using Laravel.
        <a href="#">Instagram</a> | <a href="#">Facebook</a> | <a href="#">YouTube</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
