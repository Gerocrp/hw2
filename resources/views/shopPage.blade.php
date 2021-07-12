<html>
  <head>
    <meta charset="utf-8">
    <title>WoothieryShop</title>
    <link rel="icon" type="image/png" href="Immagini/WS.png">
    <script src= '{{ url("js/shopScript.js") }}' defer></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Della+Respira&display=swap" rel="stylesheet">
    <link rel="stylesheet" href='{{ url("css/shopPage.css") }}'>
  </head>
  <body>
    <header>
      <nav>
        <div id="logo">
          <a href = '{{url("shop")}}'><img src="Immagini/WoothieryShop.png"></a>
        </div>
        <div id="links">

        @if((session('user_id')) !== null)
          <a href="logout">Disconnetti</a>
        @endif
          
          <a href='{{url("home")}}' id="home">Home</a>

          @if((session('user_id')) !== null)
          <a id = 'shoppingButton' class = 'button'>Acquisti</a>
          <a id = 'cartButton' class = 'button'>Carrello</a>
          @else
            <a href="login" class = 'button'>Accedi</a>
          @endif
          
        </div>
		<div id="menu">
        <a>
          <div></div>
          <div></div>
        </a>
        </div>
      </nav>
      <div id="menuLinks" class= 'zIndex-1'>
      
      @if((session('user_id')) !== null)
            <a href="logout">Disconnetti</a>
      @endif

        <a href='{{url("home")}}' id = "menuHomePage">Home</a>

          @if((session('user_id')) !== null)
            <a id = 'shoppingButton' class = 'button'>Acquisti</a>
            <a id = 'cartButton' class = 'button'>Carrello</a>
          @else
            <a href="login" class = 'button'>Accedi</a>
          @endif

      </div>

          @if((session('user_id')) !== null)
            <input type="hidden" name="_token" value="{{ $csrf_token }}">
            <h1>Bentornato/a {{$user['username']}}!</h1>
          @else
            <h1>Benvenuto/a, accedi per riempire il carrello</h1>
          @endif
    </header>
    <section>
      <div id="main">
        <div id="lneSearch">
            <h1>Prodotti</h1>
          <div id="searchBox">
            <h4>CERCA</h4>
            <img src= "Immagini/magGlass.png" id="magGlass">
            <input type="text" id="searchBar">
          </div>
        </div>
        <template id="product_template">
                  <article class="product">
                      <div class= "infoBox">
                          <div class="productInfo">
                            <div class= "productType"></div>
                            <div class= "productName"></div>
                            <div class= "productPrice"><div>Prezzo:</div><div></div><div>€</div></div>
                            <div class= "productAvailability"><div>Disponibilità:</div><div></div></div>
                          </div>
                          <div class="essenceInfo">
                            <div class="essenceName"><span></span></div>
                            <div class="essenceSample">
                                <img src="">
                            </div>                   
                        </div>
                      </div>
                        <div class= "interactionsBox">
                            <div class="actions">
                              <div class="buttons">
                                <div class="addToCart"><span></span></div>
                              </div>
                              <div class="reviews_form hidden">
                                    <form autocomplete="off">
                                        <input type="text" name="reviews" maxlength="254" placeholder="Scrivi una recensione..." required="required">
                                        <input type="submit">
                                        <input type="hidden" name="productId">
                                    </form>
                                </div>
                            </div>                    
                        </div>
                  </article>
              </template>
          <div id= "mainBox">
            </div>
        </div>    
        <h1>Chi siamo</h1>
        <p>La nostra famiglia lavora il legno da 8 generazioni. <br>
          Acquistiamo legni pregiati provenienti da tutti i continenti, 
          li scegliamo e seghiamo, e poi li stagioniamo con grande cura nella nostra segheria in Val di Fiemme. <br>
          La qualità e la varietà dei nostri legni ci permettono di selezionare e destinare a ogni uso e a ogni cliente il materiale più adatto e appropriato. 
          Eseguiamo le lavorazioni secondo le caratteristiche della tradizione integrate alle nuove tecnologie con l' impiego delle strumentazioni più affidabili. </p>
      </div>
    </section>

    <section id="shoppingCart" class="hidden">
      <template id="cartProduct_template">
           <article class="cartProduct">
               <div class= "infoBox">
                   <div class="productInfo">
                     <div class= "cartProductName"></div>
                     <div class= "cartProductPrice"><div>Prezzo:</div><div></div><div>€</div></div>
                   </div>
                  <div class="essenceInfo">
                    <div class="cartEssenceName"><span></span></div>
                </div>
              </div>
              <div class= "interactionsBox">
                     <div class="actions">
                       <div class="buttons">
                         <div class= quantity>Quantità:<div></div></div>
                         <div class="removeFromCart"><span></span></div>
                       </div>
                    </div>                    
                </div>
          </article>
        </template>
        <div id= "divCloseCart"><a id= "closeCart">CHIUDI</a></div>
      <div class="cart" id="cart_content">
        </div>
        <div id= "divMakeShop">
          <span id="totale">Totale:</span>  
          <a id= "Shop">ACQUISTA</a>
        </div>
      </section>

      <section id="shoppingList" class="hidden">
      <template id="shopping_template">
           <article class="shopping">
               <div class= "infoBox">
                   <div class="shoppingInfo">
                     <div class= "itemQuantity">Numero oggetti:<div></div></div>
                     <div class= "payout">Pagato:<div></div></div><div>€</div>
                   </div>
              </div>
              <div class= "interactionsBox">
                     <div class="actions">
                       <div class="buttons">
                         <div class="showDetails"><a>Dettagli</a></div>
                       </div>
                    </div>                    
                </div>
          </article>
        </template>
        <div id= "divCloseShopping"><a id= "closeShopping">CHIUDI</a></div>
      <div class="shop" id="shopping_list">
        </div>
      </section>

      <footer>
        <a><img src="Immagini/Social logo.png"></a>
        <address>Val di Fiemme - Trento (TN) </address>
        <p>Calogero Crapanzano - DIEII Unict - N. Matricola: O46002084</p>
      </footer>
    </body>
    </html>
    