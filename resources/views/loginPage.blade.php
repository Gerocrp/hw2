<html>
  <head>
        <meta charset="utf-8">
        <title>Woothiery</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Kiwi+Maru&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Della+Respira&display=swap" rel="stylesheet">
        <link rel="stylesheet" href='{{url ("css\loginPage.css")}}'>
  </head>

  <body >
        <header>
            <div id="logo">
                <a href = '{{ url("shop")}}'><img src="Immagini/WoothieryShop.png"></a>
            </div>
        </header>
        <section>
            <div id="box">

            <form name= 'login' method='post' enctype="multipart/form-data" autocomplete="off">
                <div class= "description">Dati di Accesso</div>
                <div class="username">
                    <div><label for="username">Username</label></div>
                    <div><input type="text" name='username' value= '{{ $old_username }}'></div>
                    <span></span>
                </div>
                <div class="password">
                    <div><label for="password">Password</label></div>
                    <div><input type="password" name='password'></div>
                    <span></span>
                </div>
                <div class="remember">
                    <div><input type="checkbox" name='remember' checked></div>
                    <div><label for="remember">Ricordami</label></div>
                </div>
                <div class= "submit">
                    <input type="hidden" name="_token" value="{{ $csrf_token }}">
                    <input type="submit" value= "Accedi" id="submit">
                </div>
                @if(isset($old_username))
                <div class="error">Username o password errati</div>
                @endif
            </form>
            <div class="signUp"><a href="signup">Clicka qui per REGISTRARTI</a></div>

            </div>
        </section>
        <footer>
            <address>Val di Fiemme - Trento (TN) </address>
            <p>Calogero Crapanzano - DIEII Unict - N. Matricola: O46002084</p>
        </footer>
  </body>
</html>