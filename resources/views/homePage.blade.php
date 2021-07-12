
<html>
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="Immagini/W.png">
    <title>Woothiery</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src= '{{ url("js/contents.js") }}' defer></script>
    <script src= '{{ url("js/homeScript.js") }}' defer></script>
    <link href="https://fonts.googleapis.com/css?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Della+Respira&display=swap" rel="stylesheet">
    <link rel="stylesheet" href='{{url("css/homePage.css")}}'>
  </head>
  <body>
    <header>
      <nav>
        <div id="logo">
          <a href = '{{url("home")}}'><img src="Immagini/Woothiery.png"></a>
        </div>
        <div id="links">
          <a id = "Essenze">Essenze</a>
          <a id = "ChiSiamo">Chi siamo</a>
          <a href = '{{ url("shop")}}' class="button">Negozio</a>
          </a>
        </div>
		<div id="menu">
        <a>
          <div></div>
          <div></div>
        </a>
        </div>
      </nav>
      <div id="menuLinks" class= 'zIndex-1'>
          <a id = "menuEssenze">Essenze</a>
          <a id = "menuChiSiamo">Chi siamo</a>
          <a href = '{{ url("shop")}}' class="button">Negozio</a>
          </a>
        </div>
      <h1>Legni nobili dal 1896</h1>
    </header>
    <section>
      <div id="main">
      <h1 id="bm">Primo piano</h1>
      <div class="preferiti"></div>
      <div id= "spacer"><img src="Immagini/Spacer.png"></div>
        <div id="lneSearch">
          <div id="arrows">
            <h1>Le nostre essenze</h1>
          </div>
          <div id="searchBox">
            <img src= "Immagini/magGlass.png" id="magGlass">
            <input type="text" id="searchBar">
          </div>
        </div>
          <div id= "mainBox">
            </div>
            <div id="noKeyApiBox" class="hidden">
              <img src="Immagini/upArrowSpacer.png" id = 'hideApiBox'>
                <div id="GBIF">
                  <div id="dataGBIF">
                  </div>
                </div>
                <img src="Immagini/clearSpacer.png" id = 'cleanSpacer'>
            </div>
            <div id="apiKeyApiBox">
              <span>Prenditi una pausa dallo stress della rete!</span>
              <h2 id="clickaQui">CLICKA QUI!</h2>
            </div>
        </div>    
        <h1 id="aboutUs">Chi siamo</h1>
        <p>La nostra famiglia lavora il legno da 8 generazioni. <br>
          Acquistiamo legni pregiati provenienti da tutti i continenti, 
          li scegliamo e seghiamo, e poi li stagioniamo con grande cura nella nostra segheria in Val di Fiemme. <br>
          La qualità e la varietà dei nostri legni ci permettono di selezionare e destinare a ogni uso e a ogni cliente il materiale più adatto e appropriato. 
          Eseguiamo le lavorazioni secondo le caratteristiche della tradizione integrate alle nuove tecnologie con l' impiego delle strumentazioni più affidabili. </p>
      </div>
    </section>
    <footer>
      <a><img src="Immagini/Social logo.png"></a>
      <address>Val di Fiemme - Trento (TN) </address>
      <p>Calogero Crapanzano - DIEII Unict - N. Matricola: O46002084</p>
    </footer>
  </body>
</html>
 