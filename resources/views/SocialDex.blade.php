<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/common.css') }}">
    <link rel="stylesheet" href="{{ url('css/socialdex.css') }}">
    <script src="{{ url('js/socialdex.js')}}" defer></script>
    <script src="{{url('js/common.js')}}" defer></script>
    <title>SocialDex</title>
</head>
<body> 
    <section id="header">
        <div id="header_content">
            <div id="navbar">
                <a class="nav_element" href="{{ route('HomePage') }}">Torna Indietro</a>
                <button class="buttonMenu"><img src="{{url('Images/open.png')}}"></button>
            </div>
            <div id="menuOverlay">
                <a href="{{ route('HomePage') }}">Torna Indietro</a>
            </div>
            <div id="header_title">
                Benvenuto, Questo e' il SocialDex
            </div>
        </div>
        <img src="{{ url('Images/Index/footer.gif') }}">
    </section>
    <section id="content">
        <form id="search" method="post">
            @csrf
            <input type="text" name="username" placeholder="INSERIRE UN USERNAME">
            <input type="submit" value="cerca">
        </form>
        @if (isset($Errore))
            <div id="Errore">
                ATTENZIONE L'UTENTE INSERITO NON ESISTE
            </div>
        @else
            @if ($Infos !==null)
                <div id="SocialDex">   
                    @foreach ($Infos as $Info)
                    <div id="Pokemon">
                        <div id="image">
                            <img src="{{$Info['Pokemon']['img']}}">
                        </div>
                        <div id="info">
                            <div id="seen">
                                <span>
                                    Name: {{$Info['Pokemon']['Name']}}
                                </span>
                                <div>
                                    <span id="{{$Info['Pokemon']['Type1']}}">
                                        Type 1 : {{$Info['Pokemon']['Type1']}}
                                    </span>
                                    @if ($Info['Pokemon']['Type2'] !== null)
                                        <span id="{{$Info['Pokemon']['Type2']}}">
                                            Type 2 : {{$Info['Pokemon']['Type2']}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @if ($Info['Catturato'])
                                <div class="captured">
                                    <span>HP : {{$Info['Pokemon']['Hp']}}</span>
                                    <span>Attack : {{$Info['Pokemon']['Attack']}}</span>
                                    <span>Defense : {{$Info['Pokemon']['Defense']}}</span>
                                    <span>SpecialAttack : {{$Info['Pokemon']['SpecialAttack']}}</span>
                                    <span>SpecialDefense : {{$Info['Pokemon']['SpecialDefense']}}</span>
                                    <span>Speed : {{$Info['Pokemon']['Speed']}}</span>
                                    <span>Height : {{$Info['Pokemon']['Height']}}</span>
                                    <span>Weight : {{$Info['Pokemon']['Weight']}}</span>
                                </div>
                            @else
                                <div class="captured">
                                    <span>ATTENZIONE!! CATTURARE IL POKEMON <br>PER VEDERE PIU DETTAGLI</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div id="Errore">
                    ATTENZIONE L'UTENTE NON HA ANCORA CATTURATO NESSUN POKEMON
                </div>
            @endif
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