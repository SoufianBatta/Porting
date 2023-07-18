<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/signin.css') }}">
    <script src="{{ url('js/signin.js') }}" defer></script>
    <title>Signin</title>
</head>
<body>
    <div id="Content">
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
    </div>
</body>
</html>