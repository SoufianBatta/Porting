<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/common.css')}}">
    <link rel="stylesheet" href="{{ url('css/homepage.css') }}">
    <script src="{{ url('js/homepage.js') }}" defer></script>
    <title>Homepage</title>
</head>
<body>
    <img id="background_body" src="{{ url('Images/Login/background.jpg') }}">
    <section class="init" id="header">
        <div id="header_content">
            <div id="navbar">
                <a href="{{ route('Pokebattle') }}">ALL'AVVENTURA</a>
                <a href="socialdex_view.php">SOCIALDEX</a>
                <a href="{{ route('Logout') }}">ESCI</a>
            </div>
            <div id="header_title">
                Benvenuto {{$Utente->Username}}!
            </div>
        </div>
        <img src="{{ url('Images/Index/footer.gif') }}">
    </section>
    <section id="content">
        <section id="profile">
            <div id="picture">
                <img src="{{$Utente->Avatar}}">
                <input type="file" name="propic" value="CHANGE PROFILE PIC">
                @csrf
            </div>
            <div id="info">
                <span>Nome: {{$Utente->Nome}}</span>
                <span>Cognome: {{$Utente->Cognome}}</span>
                <span>Email: {{$Utente->Email}}</span>
                <span>Telefono: {{$Utente->Telefono}}</span>
                <span>Username: {{$Utente->Username}}</span>
            </div>
        </section>
    </section>
    <section id="footer">
        <div id="footer_content">
            <span>Soufian Batta 1000003096</span>
            <span> {{ date('l\, jS \of F Y') }} </span>
        </div>
    </section>
</body>
</html>