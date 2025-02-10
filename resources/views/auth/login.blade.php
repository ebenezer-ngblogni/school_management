<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Connexion</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- FontAwesome & Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ url('css/styles.css') }}" />
</head>

<body>
    
     <!-- Loading Overlay -->
     <div class="loading-overlay">
        <div class="loading-spinner"></div>
    </div>

    <div class="container">
        <div class="login-section">
            <h2>Bienvenue !</h2>
            <h1>Connexion</h1>
            @include('_message')
            <form class="login-form" action="{{ url('login') }}" method="post">
                {{ csrf_field() }}
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="exemple@gmail.com" required
                    class="form-control" />
                <label for="password">Mot de passe</label>
                <div class="password-container d-flex align-items-center">
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required
                        class="form-control" />
                    <span class="toggle-password ms-2" style="cursor: pointer">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Se souvenir de moi</label>
                </div>
                <a href="{{ url('forgot-password') }}" class="forgot-password">Mot de passe oublié ?</a>
                <button type="submit" class="bttn login-btn">Se connecter</button>
            </form>
            <p class="divider">ou</p>
            <button type="button" class="bttn demo-btn" data-bs-toggle="modal" data-bs-target="#demoAccountModal">
                Utiliser un compte démo
            </button>
        </div>
        <div class="image-section">
            <img class="img-school-girl" src="{{ url('assets/girl.png') }}" alt="Illustration" />
        </div>
    </div>
    @include('modals.demo_account')
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('js/script.js') }}"></script>
    <script src="{{ url('js/demo-account.js') }}"></script>
</body>

</html>
