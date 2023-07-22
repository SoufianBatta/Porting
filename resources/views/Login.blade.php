<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/common.css')}}">
    <link rel="stylesheet" href="{{url('css/login.css')}}">
    <script src="{{ url('js/login.js') }}" defer></script>
    <title>Login</title>
</head>
<body>
    <img id="background" src="{{ url('Images/Login/background.jpg')}}">
    <section id="header">
        <div id="header_content">
            <div id="navbar">
                <a href="{{ route('Index') }}">Torna Indietro</a>
            </div>
            <div id="header_title">
                Accedi nel mondo Del SocialDex
            </div>
        </div>
        <img src="{{ url('Images/Index/footer.gif') }}">
    </section>
    <section id="content">
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
        @if (isset($Errore) && $Errore === 'Password')
        <div id="internal_error">
            <h1>ATTENZIONE PASSWORD ERRATA</h1>
        </div>
        @elseif (isset($Errore) && $Errore === 'Username')
        <div id="internal_error">
            <h1>ATTENZIONE L'USERNAME NON ESISTE</h1>
        </div>
        @endif
    </section>
    <section id="footer">
        <div id="footer_content">
            <span>Soufian Batta 1000003096</span>
            <span> {{ date('l\, jS \of F Y') }} </span>
        </div>
    </section> 
</body>
</html>