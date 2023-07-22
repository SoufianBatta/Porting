<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/common.css') }}">
    <link rel="stylesheet" href="{{ url('css/socialdex.css') }}">
    <title>SocialDex</title>
</head>
<body> 
    <section id="header">
        <div id="header_content">
            <div id="navbar">
                <a href="{{ route('HomePage') }}">Torna Indietro</a>
            </div>
            <div id="header_title">
                Accedi nel mondo Del SocialDex
            </div>
        </div>
        <img src="{{ url('Images/Index/footer.gif') }}">
    </section>
    <section id="content">
        <div id="SocialDex">
               @if ($Infos !==null)
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
                        @endif
                    </div>
                </div>
                @endforeach
               @endif
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