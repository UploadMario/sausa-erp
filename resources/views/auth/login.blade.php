@extends('layouts.guest')

@section('content')
<style>
/* === Fondo con partículas === */
body {
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #1565c0, #42a5f5);
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

/* === Caja del login === */
.login-container {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.login-box {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    backdrop-filter: blur(15px);
    padding: 40px 35px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    width: 380px;
    text-align: center;
    animation: fadeIn 1s ease-out;
    color: #fff;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
.login-box h2 {
    font-weight: 700;
    margin-bottom: 20px;
    text-shadow: 0 0 8px rgba(255,255,255,0.3);
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
.btn-login {
    background: linear-gradient(135deg, #42a5f5, #1565c0);
    border: none;
    color: white;
    padding: 12px;
    width: 100%;
    border-radius: 12px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
}
.btn-login:hover {
    transform: scale(1.05);
    background: linear-gradient(135deg, #64b5f6, #1976d2);
    box-shadow: 0 4px 15px rgba(33,150,243,0.4);
}
.forgot {
    margin-top: 10px;
    color: #bbdefb;
    font-size: 0.9rem;
    text-decoration: none;
}
.forgot:hover {
    color: #fff;
    text-decoration: underline;
}
.logo {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    margin-bottom: 15px;
    box-shadow: 0 0 25px rgba(255,255,255,0.3);
}
</style>

<div id="particles-js"></div>

<div class="login-container">
    <div class="login-box">
        <img src="https://cdn-icons-png.flaticon.com/512/2966/2966488.png" alt="logo" class="logo">
        <h2>Bienvenido a <span style="color:#bbdefb;">SausaERP</span></h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3 text-start">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input id="email" type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" required autofocus
                    placeholder="Ingresa tu correo">
                @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Contraseña</label>
                <input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password" required
                    placeholder="••••••••">
                @error('password')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-login mt-3">Iniciar Sesión</button>

            @if (Route::has('password.request'))
                <a class="forgot d-block mt-2" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
particlesJS("particles-js", {
    "particles": {
        "number": { "value": 80, "density": { "enable": true, "value_area": 800 } },
        "color": { "value": ["#42a5f5", "#90caf9", "#e3f2fd"] },
        "shape": { "type": "circle" },
        "opacity": { "value": 0.5 },
        "size": { "value": 3 },
        "line_linked": { "enable": true, "distance": 150, "color": "#90caf9", "opacity": 0.4, "width": 1 },
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
