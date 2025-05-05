<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    </head>
    <body class="bg-light d-flex justify-content-center align-items-center min-vh-100">

        <!-- Main Container -->
        <div class="card shadow-lg border-0 rounded-3" style="max-width: 400px; width: 100%; padding: 30px;">

            <!-- Header Section -->
            <div class="text-center mb-4">
                <h1 class="display-6 text-primary">Welcome to Your Dashboard</h1>
                <p class="text-muted">Log in to manage your projects and settings.</p>
            </div>

            <!-- Login/Register Section -->
            <div class="d-flex justify-content-center gap-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-success btn-lg w-100 py-2">
                            <i class="bi bi-house-door"></i> Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg w-100 py-2">
                            <i class="bi bi-box-arrow-in-right"></i> Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-warning btn-lg w-100 py-2">
                                <i class="bi bi-person-plus"></i> Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Done Button Section -->
            <div class="text-center mt-4">
                <button class="btn btn-danger btn-lg w-100 py-2" id="doneButton">
                    <i class="bi bi-check-circle"></i> Done
                </button>
            </div>

            <!-- Footer Section -->
            <footer class="text-center mt-4">
                <p class="text-muted">© 2025 Laravel Dashboard | All rights reserved.</p>
            </footer>
        </div>

        <!-- Bootstrap JS and Icons -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.js"></script>

        <!-- JavaScript for Done Button -->
        <script>
            document.getElementById("doneButton").addEventListener("click", function() {
                alert("Action completed successfully!");
            });
        </script>
    </body>
</html>
