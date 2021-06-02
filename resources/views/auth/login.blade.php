<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <h2 style="margin-top:-50px">Gestion de demandes</h2>
    <div id="login" class="login-form-container">
        <header>Connexion</header>
        <fieldset>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-wrapper">
                    <input type="text" name="email"  placeholder="exemple@email.com" />
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="input-wrapper">
                    <input type="password" name="password" placeholder="Mot de passe" />
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button id="continue" type="submit">Connecter</button>
            </form>
        </fieldset>
    </div>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>