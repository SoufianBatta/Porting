<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/login.css')}}">
    <script src="{{ url('js/login.js') }}" defer></script>
    <title>Login</title>
</head>
<body>
    <div id="Content">
        <form method='POST' name="login" id="login">
            @csrf
            <div>
                <span>
                    <label class="normal">Username<input type="text" name="username" placeholder="Inserire lo Username"></label>
                </span>
            </div>
            <div>
                <span>
                    <label class="normal">Password<input type="password" name="password" placeholder="Inserire la Password"></label>
                </span>
            </div>
            <input type="submit" value="Accedi">
        </form>

        <div id="sign">
            Non sei ancora Registrato? <a href="{{ route('Signin') }}">Registrati Ora</a>
        </div>
    </div>
</body>
</html>