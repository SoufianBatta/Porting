<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/signin.css') }}">
    <link rel="stylesheet" href="{{url('css/common.css')}}">
    <script src="{{ url('js/signin.js') }}" defer></script>
    <script src="{{url('js/common.js')}}" defer></script>
    <title>Signin</title>
</head>
<body>
    <img id="background" src="{{ url('Images/Login/background.jpg') }}">
    <section class="init" id="header">
        <div id="header_content">
            <div id="navbar">
                <a class="nav_element" href="{{ route('Index') }}">Torna Indietro</a>
                <button class="buttonMenu"><img src="{{url('Images/open.png')}}"></button>
            </div>
            <div id="menuOverlay">
                <a href="{{ route('Index') }}">Torna Indietro</a>
            </div>
            <div id="header_title">
                Registrati nel mondo Del SocialDex
            </div>
        </div>
        <img src="{{ url('Images/Index/footer.gif') }}">
    </section>
    <section id="content">
        <div id="SigninForm">
            <form method='post' name='signin' id="signin">
                @csrf
                <label>
                Nome 
                    <input type='text' name = 'nome' placeholder='Inserire il nome'>
                </label>
                <label>
                    Cognome 
                    <input type='text' name = 'cognome' placeholder='Inserire il cognome'>
                </label>
                <label>
                    Email 
                    <input type='text' name = 'email' placeholder='Inserire la mail'>
                </label>
                <label>
                    Telefono 
                    <input type='text' name = 'telefono' placeholder='Inserire il numero di telefono'>
                </label>
                <label>
                    Username 
                    <input type='text' name = 'username' placeholder='Inserire il tuo username'>
                </label>
                <label>
                    Password 
                    <input type='password' name = 'password' placeholder='Inserire la password'>
                </label>
                <input type='submit' name='invio' value='Invia'>
            </form>
            <div id="info_box" class="vanish">
                <div>

                </div>
            </div>
    </div>
    </section>
    @if (isset($Errore))
    <div id="Exist">
        ATTENTIONE USERNAME O EMAIL GIA PRESENTI
    </div>
    @endif
    <section id="footer">
        <div id="footer_content">
            <span>Soufian Batta 1000003096</span>
            <span> {{ date('l\, jS \of F Y') }} </span>
        </div>
    </section>
</body>
</html>