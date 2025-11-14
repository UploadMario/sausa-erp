<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SausaERP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        /* ==== GENERAL ==== */
        body {
            background: radial-gradient(circle at top left, #e3f2fd, #fdfefe);
            font-family: 'Poppins', sans-serif;
            transition: background 0.5s ease;
        }
        body.dark-mode {
            background: radial-gradient(circle at top left, #0d1117, #1b1f24);
            color: #e0e0e0;
        }

        /* ==== NAVBAR ==== */
        .navbar-glass {
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.15);
            border-bottom: 1px solid rgba(255,255,255,0.2);
            transition: background 0.5s ease, color 0.5s ease;
        }
        .dark-mode .navbar-glass {
            background: rgba(0, 0, 0, 0.4);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .navbar-brand {
            font-weight: 700;
            color: #1976d2 !important;
            letter-spacing: 1px;
            font-size: 1.3rem;
        }
        .dark-mode .navbar-brand {
            color: #90caf9 !important;
        }

        /* ==== BOTÓN DE MODO OSCURO ==== */
        .toggle-dark {
            border: none;
            background: none;
            color: #1565c0;
            font-size: 1.4rem;
            cursor: pointer;
            transition: transform 0.3s, color 0.3s;
        }
        .toggle-dark:hover {
            transform: rotate(15deg);
            color: #2196f3;
        }
        .dark-mode .toggle-dark {
            color: #90caf9;
        }

        /* ==== CONTENIDO ==== */
        .content-wrapper {
            margin-top: 90px;
            animation: fadeIn 1s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ==== FOOTER ==== */
        footer {
            text-align: center;
            padding: 1rem;
            font-size: 0.9rem;
            color: #546e7a;
            border-top: 1px solid rgba(0,0,0,0.1);
            background: rgba(255,255,255,0.3);
            margin-top: 40px;
        }
        .dark-mode footer {
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #90a4ae;
            background: rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <!-- ==== NAVBAR ==== -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-glass shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('inicio') }}">
                <i class="fa-solid fa-hospital"></i> SausaERP
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">

                    <!-- Botón modo oscuro -->
                    <li class="nav-item">
                        <button class="toggle-dark me-3" id="darkModeBtn" title="Cambiar tema">
                            <i class="fa-solid fa-moon"></i>
                        </button>
                    </li>

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-semibold text-primary" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-user-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg rounded-3">
                                <li class="dropdown-item text-center">
                                    <i class="fa-solid fa-user"></i>
                                    <p class="mb-1 fw-bold">{{ Auth::user()->email }}</p>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger fw-semibold" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
                                    </a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- ==== CONTENIDO ==== -->
    <div class="content-wrapper container">
        @yield('content')
    </div>

    <!-- ==== FOOTER ==== -->
    <footer>
        <p>© {{ date('Y') }} SausaERP — 
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleDark = document.getElementById('darkModeBtn');
        toggleDark.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            const icon = toggleDark.querySelector('i');
            icon.classList.toggle('fa-sun');
            icon.classList.toggle('fa-moon');
        });
    </script>
</body>
</html>
        