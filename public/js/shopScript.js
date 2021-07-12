function showHideMenu(event){
    if(shown == 0){
        document.getElementById('menuLinks').classList.remove('zIndex-1');
        document.getElementById('menuLinks').classList.add('zIndex2');
        shown++;
    }
    else if(shown == 1){
        document.getElementById('menuLinks').classList.add('zIndex-1');
        document.getElementById('menuLinks').classList.remove('zIndex2');
        shown--;
    }
}

function searchProduct(){
    fetchProducts(textInput.value);
}

function onResponse(response){
    if(!response.ok){
        console.log(response);
    }
    else
    return response.json();
}

function fetchProducts(toFind){
    fetch("product/{" + toFind + "}").then(onResponse).then(fetchProductsJson);
}

function fetchCart(){
    fetch("cartProducts").then(onResponse).then(fetchCartJson);
}

function setSample(toFind){
    fetch("essence/{" + toFind + "}").then(onResponse).then(fetchSetSample);
}

function fetchSetSample(json){
    const productSample = document.querySelectorAll('.essenceName');
    for(let sample of productSample){
        for(let i in json){
            let thisEssence = JSON.parse(json[i].essence);
            if(sample.querySelector('span').textContent === thisEssence.name){
                sample.parentNode.querySelector('.essenceSample img').src = thisEssence.sample;
            }
        }
    }
}

function writeReview(event){
    event.currentTarget.parentNode.parentNode.querySelector('.reviews_form').classList.remove('hidden');
}

function fetchProductsJson(json){
    document.querySelector('#mainBox').innerHTML = '';
    for(let i in json){

        let thisProduct = JSON.parse(json[i].product);

        const addProduct = document.getElementById('product_template').content.cloneNode(true).querySelector(".product");
        addProduct.querySelector('.productType').textContent = thisProduct.type;
        addProduct.querySelector('.productName').textContent = thisProduct.name;
        addProduct.querySelectorAll('.productPrice div')[1].textContent = thisProduct.price;
        addProduct.querySelectorAll('.productAvailability div')[1].textContent = thisProduct.availability;
        addProduct.querySelector('.essenceName span').textContent = thisProduct.essence;
        addProduct.dataset.id = addProduct.querySelector("input[type = hidden]").value = parseInt(i) +1;
        addProduct.querySelector('.addToCart').addEventListener('click', addToCart);
        if(thisProduct.availability < 1){
            addProduct.querySelector('.addToCart').removeEventListener('click', addToCart);
            addProduct.querySelector('.addToCart').classList.add('cannotAdd');
            addProduct.querySelector('.productAvailability').classList.add('makeRed');
        }
        document.getElementById('mainBox').appendChild(addProduct);
    }
    setSample('');
}


function fetchCartJson(json){
        
        document.querySelector('#cart_content').innerHTML = '';
        for(let i in json){
        const addCartProduct = document.getElementById('cartProduct_template').content.cloneNode(true).querySelector(".cartProduct");
        addCartProduct.querySelector('.cartProductName').textContent = document.querySelector(".product[data-id='"+ json[i].productId +"']").querySelector('.productName').textContent;
        addCartProduct.querySelectorAll('.cartProductPrice div')[1].textContent = document.querySelector(".product[data-id='"+json[i].productId +"']").querySelectorAll('.productPrice div')[1].textContent * json[i].quantity;
        addCartProduct.querySelector('.cartEssenceName span').textContent = document.querySelector(".product[data-id='"+json[i].productId +"']").querySelector('.essenceName').textContent;
        addCartProduct.querySelector('.quantity div').textContent = json[i].quantity;
        addCartProduct.dataset.productId= json[i].productId;
        addCartProduct.querySelector('.removeFromCart').addEventListener('click', removeFromCart);
        document.getElementById('cart_content').appendChild(addCartProduct);
        }
        
}


function addToCart(event){
    button = event.currentTarget;
    const formData = new FormData();
    formData.append('productId', button.parentNode.parentNode.parentNode.parentNode.dataset.id);
    fetch("addToCart", {method: 'post', headers:{"X-CSRF-Token": document.querySelector('input[name=_token]').value}, body : formData}).then(onResponse).then(updateAvailability).then(fetchCart);
}

function removeFromCart(event){
    button = event.currentTarget;
    const formData = new FormData();
    formData.append('cartProductId', button.parentNode.parentNode.parentNode.parentNode.dataset.productId);
    fetch("removeFromCart", {method: 'post', headers:{"X-CSRF-Token": document.querySelector('input[name=_token]').value}, body : formData}).then(onResponse).then(updateAvailability).then(fetchCart);
}

function updateAvailability(json) {
    document.querySelector('[data-id="'+json.productid+'"]').querySelectorAll('.productAvailability div')[1].textContent = json.availability.quantity;
    if (json.availability.quantity < 1) {
        button.removeEventListener('click', addToCart);
        button.classList.add('cannotAdd');
        button.parentNode.parentNode.parentNode.parentNode.querySelector('.productAvailability').classList.add('makeRed');
    }
    fetchCart();
    fetchProducts('');
}

function toggleCart(){
    if(document.getElementById('shoppingCart').className == "hidden"){
        document.getElementById('shoppingCart').classList.remove('hidden');
    } else{
        document.getElementById('shoppingCart').classList.add('hidden');
    }
}

function toggleShopping(){
    if(document.getElementById('shoppingList').className == "hidden"){
        document.getElementById('shoppingList').classList.remove('hidden');
    } else{
        document.getElementById('shoppingList').classList.add('hidden');
    }
}

function fetchShoppings(){
    fetch("shoppings").then(onResponse).then(fetchShoppingsJson).then(fetchCart);
}
function fetchShoppingsJson(json){
    document.querySelector('#shopping_list').innerHTML = '';
        for(let i in json){
        let thisList = JSON.parse(json[i].itemList);
            for(let i in thisList){
                quantity += i.quantity;
            }
        const addShopping = document.getElementById('shopping_template').content.cloneNode(true).querySelector(".shopping");
        addShopping.querySelector('.itemQuantity div').textContent = quantity;
        addShopping.querySelector('.payout div').textContent = thisList.totalPrice;
        document.getElementById('shopping_list').appendChild(addShopping);
        }
}

function makeShopping(){
    fetch('makeShopping').then(onResponse).then(fetchShoppings);
}

fetchProducts('');
fetchCart();


let shown = 0;
const toggleMenu = document.getElementById('menu');
toggleMenu.addEventListener('click', showHideMenu);

const textInput = document.getElementById('searchBar');
textInput.addEventListener('keyup', searchProduct);

document.querySelectorAll('#cartButton')[0].addEventListener('click', toggleCart);
document.querySelectorAll('#cartButton')[1].addEventListener('click', toggleCart);

document.querySelectorAll('#shoppingButton')[0].addEventListener('click', toggleShopping);
document.querySelectorAll('#shoppingButton')[1].addEventListener('click', toggleShopping);

document.getElementById('closeCart').addEventListener('click', toggleCart);
document.getElementById('closeShopping').addEventListener('click', toggleShopping);
document.getElementById('Shop').addEventListener('click', makeShopping);
