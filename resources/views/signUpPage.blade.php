<?php
?>

<html>
  <head>
        <meta charset="utf-8">
        <title>Woothiery</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src='{{ url("js\signUpPage.js") }}' defer></script>
        <link href="https://fonts.googleapis.com/css?family=Kiwi+Maru&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Della+Respira&display=swap" rel="stylesheet">
        <link rel="stylesheet" href='{{url ("css\signUpPage.css")}}'>
  </head>

  <body>
        <header>
            <div id="logo">
                <a href = "shop"><img src="Immagini/WoothieryShop.png"></a>
            </div>
        </header>
        <section>
            <div id="box">
            <form name= 'signUp' method='post' enctype="multipart/form-data" autocomplete="off">
                <div class= "description">Le tue credenziali</div>
                <div class= "group">
                    <div class="name">
                        <div><label for="name">*Nome</label></div>
                        <div><input type="text" name='name'></div>
                        <span></span>
                    </div>
                    <div class="surname">
                        <div><label for="surname">*Cognome</label></div>
                        <div><input type="text" name='surname'></div>
                        <span></span>
                    </div>
                </div>
                <div class="username">
                    <div><label for="username">*Username</label></div>
                    <div><input type="text" name='username'></div>
                    <span></span>
                </div>
                <div class="email">
                    <div><label for="email">*e-mail</label></div>
                    <div><input type="text" name='email'></div>
                    <span></span>
                </div>
                <div class= "group">
                    <div class="password">
                        <div><label for="password">*Password</label></div>
                        <div><input type="password" name='password'></div>
                        <span></span>
                    </div>
                    <div class="confirmPassword">
                        <div><label for="confirmPassword">*Ripeti Pasword</label></div>
                        <div><input type="password" name='confirmPassword'></div>
                        <span></span>
                    </div>
                </div>
                <div class="description">Il tuo indirizzo</div>
                <div class="district">
                    <div><label for="district">*Provincia</label></div>
                    <div><input type="text" name='district'></div>
                    <span></span>
                </div>
                <div class="group">
                    <div class="city">
                        <div><label for="city">*Città</label></div>
                        <div><input type="text" name='city'></div>
                        <span></span>
                    </div>
                    <div class="CAPcode">
                        <div><label for="CAPcode">*CAP</label></div>
                        <div><input type="text" name='CAPcode'></div>
                        <span></span>
                    </div>
                </div>
                <div class="group">
                <div class="street1">
                    <div><label for="street1">*Indirizzo - riga 1</label></div>
                    <div><input type="text" name='street1'></div>
                    <span></span>
                </div>
                <div class="street2">
                    <div><label for="street2">Indirizzo - riga 2</label></div>
                    <div><input type="text" name='street2'></div>
                    <span></span>
                </div>
                </div>
                <div class= "submit">
                    <input type="hidden" name="_token" value="{{ $csrf_token }}">
                    <input type="submit" value= "Registrati" id="submit" disabled>
                </div>
                <span id = "campiObbligatori">(*) Campi obbligatori</span>
            </form>
            <div class="login"><a href="login">ACCEDI se sei gia registrato</a></div>
            </div>
        </section>
        <footer>
            <address>Val di Fiemme - Trento (TN) </address>
            <p>Calogero Crapanzano - DIEII Unict - N. Matricola: O46002084</p>
        </footer>
  </body>
</html>