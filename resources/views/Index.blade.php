<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/common.css') }}">
    <link rel="stylesheet" href="{{ url('css/index.css') }}">
    <script src="{{url('js/common.js')}}" defer></script>
    <title>Index</title>
</head>
<body>
    <section id="header">
        <div id="header_content">
            <div id="navbar">
                <a class="nav_element" href="{{ route('Login') }}">Accedi</a>
                <a class="nav_element" href="{{ route('Signin') }}">Iscriviti</a>
                <button class="buttonMenu"><img src="{{url('Images/open.png')}}"></button>
            </div>
            <div id="menuOverlay">
                <a href="{{ route('Login') }}">Accedi</a>
                <a href="{{ route('Signin') }}">Iscriviti</a>
            </div>
            <div id="header_title">
                Benvenuto nel mondo Del SocialDex
            </div>
        </div>
        <img src="{{ url('Images/Index/footer.gif') }}">
    </section>
    <section id="content">
        <div id="main_content">
            <div class="preview">
                <p>
                    Qui Potrai Catturare tutti i tuoi Pokemon preferiti ti bastera superare delle sfide per poi scoprire quale pokemon hai catturato
                </p>
                <div><img src="{{ url('Images\Index\test.webp') }}"></div>
            </div>
            <div class="preview">
               <div><img src="{{ url('Images\Index\catchemall.webp') }}"></div>
               <p>
                    Mostra a tutti i Pokemon che hai catturato, nel SocialDex saranno presenti tutti i Pokemon che hai incontrato e catturato, vantati di essere un allenatore micidiale!
                </p>
            </div>
            <div class="preview">
                <p>
                    potrai cercare nel tuo personale SocialDex tutti i pokemon che hai catturato e le loro caratteristiche
                </p>
                <div><img src="{{ url('Images\Index\pokedex.jpg') }}"></div>
            </div>
        </div>
    </section>
    <section id="footer">
        <div id="footer_content">
            <span>Soufian Batta 1000003096</span>
            <span> {{ date('l\, jS \of F Y') }} </span>
        </div>
    </section>
</body>
</html>