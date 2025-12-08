<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap CSS --}}
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet">

    {{-- App CSS & JS (Laravel + Vite) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>SkillBridge</title>

    <style>
        body {
            background: #f3f4f7;
            font-family: 'Poppins', sans-serif;
        }

        /* Floating Glass Navbar */
        .glass-navbar {
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.55);
            border: 1px solid rgba(255,255,255,0.5);
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .nav-link {
            font-weight: 600;
        }
    </style>
</head>

<body class="text-dark">

    {{-- PREMIUM FLOATING NAVBAR --}}
    <nav class="navbar navbar-expand-lg glass-navbar py-3 position-fixed top-0 start-50 translate-middle-x w-100"
         style="max-width: 1250px; z-index: 200; border-radius: 22px; margin-top: 18px;">

        <div class="container-fluid px-4">

            {{-- Branding --}}
            <a class="navbar-brand fs-4" href="/">
                SkillBridge
            </a>

            {{-- Mobile Button --}}
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Menu --}}
            <div class="collapse navbar-collapse justify-content-end" id="navbarMain">

                <ul class="navbar-nav align-items-center gap-2">

                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Dashboard</a>
                    </li>

                    {{-- User Dropdown --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-3">

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item text-danger fw-semibold">
                                        Logout
                                    </button>
                                </form>
                            </li>

                        </ul>

                    </li>

                </ul>

            </div>

        </div>
    </nav>

    {{-- SPACER supaya konten tidak tertutup navbar --}}
    <div style="height: 120px;"></div>

    {{-- CONTENT --}}
    <div class="min-vh-100">
        @yield('content')
    </div>

    {{-- Bootstrap JS --}}
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>
