<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mot de passe oublié</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome & Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
        --primary-color: #6673fd;
        }
        body {
            /* background-color: #6366f1; */
            background: linear-gradient(135deg, var(--primary-color) 0%, #818cf8 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            position: relative;
            overflow: hidden;
            padding: 2.5rem;
        }
        
        .illustration {
            position: absolute;
            right: -100px;
            top: -50px;
            width: 300px;
            opacity: 0.1;
            pointer-events: none;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 1rem;
            border: 2px solid #e5e7eb;
            font-size: 1rem;
            background-color: var(--gray-light);
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.1);
        }
        
        .btn-reset {
            background-color: #6366f1;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
        }
        
        .btn-reset:hover  {
          transform: translateY(-2px);
          background-color: #6366f1;
          color: white;
          box-shadow: 0 8px 15px rgba(102, 115, 253, 0.3);
        }
        
        .back-to-login {
            color: #6366f1;
            text-decoration: none;
        }
        
        .back-to-login:hover {
            color: #4f46e5;
            text-decoration: underline;
        }

        .icone{
          margin-left: 3px;
          margin-right: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="login-card">
                    <!-- Message de succès/erreur -->
                    @include('_message')
                    
                    <div class="text-center mb-4">
                        <h1 class="h3 mb-3">Mot de passe oublié</h1>
                        <p class="text-muted">Entrez votre email pour réinitialiser votre mot de passe</p>
                    </div>

                    <form action="{{ url('forgot-password') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <div class="input-group">
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" 
                                       placeholder="Email"
                                       required 
                                       autofocus>
                                <span class="input-group-text">
                                    <i class="fas fa-envelope icone"></i>
                                </span>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-reset w-100">
                                Réinitialiser le mot de passe
                            </button>
                        </div>

                        <div class="text-center">
                            <a href="{{ url('/') }}" class="back-to-login">
                                Retour à la connexion
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
</body>
</html>