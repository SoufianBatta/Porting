<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ url('js/pokebattle.js') }}" defer="true"></script>
    <link rel="stylesheet" href="{{ url('css/common.css')}}">
    <link rel="stylesheet" href="{{ url('css/pokebattle.css') }}">
    <title>Documents</title>
</head>
<body>
    <section id="header">
        <div id="header_content">
            <div id="navbar">
                <a href="{{ route('HomePage') }}">Torna Indietro</a>
            </div>
            <div id="header_title">
                Cattura Il Pokemon!
            </div>
        </div>
        <img src="{{ url('Images/Index/footer.gif') }}">
    </section>
    <section id="content">
    <div id="Wild">
        <div id="Pokemon">
        </div>
    </div>
    <div id="Game">
        <div id="grid">

            <div id="one" class="notchosen"></div>
            <div id="two" class="notchosen"></div>
            <div id="three" class="notchosen"></div>

            <div id="four" class="notchosen"></div>
            <div id="five" class="notchosen"></div>
            <div id="six" class="notchosen"></div>

            <div id="seven" class="notchosen"></div>
            <div id="eight" class="notchosen"></div>
            <div id="nine" class="notchosen"></div>

        </div>
    </div>
    <div id="Result">
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