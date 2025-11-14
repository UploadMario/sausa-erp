@extends('layouts.app')

@section('content')
<style>
body {
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #42a5f5, #1565c0);
    height: 100vh;
    overflow: hidden;
    font-family: 'Poppins', sans-serif;
}
#particles-js {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
}

/* Caja principal */
.register-container {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.register-box {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    padding: 40px 35px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    width: 400px;
    text-align: center;
    animation: fadeIn 1s ease-out;
    color: #fff;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
.register-box h2 {
    font-weight: 700;
    margin-bottom: 20px;
    color: #e3f2fd;
    text-shadow: 0 0 10px rgba(255,255,255,0.3);
}
.form-control {
    border-radius: 12px;
    background: rgba(255,255,255,0.2);
    color: white;
    border: none;
    padding: 12px;
}
.form-control::placeholder {
    color: rgba(255,255,255,0.7);
}
.btn-register {
    background: linear-gradient(135deg, #66bb6a, #2e7d32);
    border: none;
    color: white;
    padding: 12px;
    width: 100%;
    border-radius: 12px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}
.btn-register:hover {
    transform: scale(1.05);
    background: linear-gradient(135deg, #81c784, #388e3c);
    box-shadow: 0 4px 15px rgba(76,175,80,0.4);
}
a.login-link {
    color: #bbdefb;
    text-decoration: none;
    font-size: 0.9rem;
}
a.login-link:hover {
    color: #fff;
    text-decoration: underline;
}
.logo {
    width: 85px;
    height: 85px;
    border-radius: 50%;
    margin-bottom: 10px;
    box-shadow: 0 0 25px rgba(255,255,255,0.3);
}
</style>

<div id="particles-js"></div>

<div class="register-container">
    <div class="register-box">
        <img src="https://cdn-icons-png.flaticon.com/512/8993/8993988.png" alt="logo" class="logo">
        <h2>Crear una cuenta</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3 text-start">
                <label for="name" class="form-label">Nombre completo</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autofocus placeholder="Ej. Dr. Juan Pérez">
                @error('name')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 text-start">
                <label for="email" class="form-label">Correo electrónico</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required placeholder="ejemplo@correo.com">
                @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Contraseña</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" required placeholder="••••••••">
                @error('password')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 text-start">
                <label for="password-confirm" class="form-label">Confirmar contraseña</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repite tu contraseña">
            </div>

            <button type="submit" class="btn-register mt-2">Registrar</button>

            <p class="mt-3">¿Ya tienes una cuenta?  
                <a href="{{ route('login') }}" class="login-link">Inicia sesión</a>
            </p>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
particlesJS("particles-js", {
    "particles": {
        "number": { "value": 80, "density": { "enable": true, "value_area": 800 } },
        "color": { "value": ["#66bb6a", "#a5d6a7", "#e8f5e9"] },
        "shape": { "type": "circle" },
        "opacity": { "value": 0.5 },
        "size": { "value": 3 },
        "line_linked": { "enable": true, "distance": 150, "color": "#a5d6a7", "opacity": 0.4, "width": 1 },
        "move": { "enable": true, "speed": 2, "direction": "none", "out_mode": "out" }
    },
    "interactivity": {
        "events": { "onhover": { "enable": true, "mode": "repulse" } },
        "modes": { "repulse": { "distance": 100 } }
    },
    "retina_detect": true
});
</script>
@endsection
