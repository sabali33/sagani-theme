
var labels = document.getElementsByClassName("current-track");//document.querySelector('.current-track');
var cart_increase = document.querySelector('.increase-cart');
if(cart_increase){
        cart_increase.addEventListener('click', function(){
        
        if(this.getAttribute('class').match("increase-cart")){
            this.parentNode.querySelector('input').stepUp();
        }
        
    });
}

var cart_decrease = document.querySelector('.decrease-cart');
if(cart_decrease){
    cart_decrease.addEventListener('click', function(){
    
        if(this.getAttribute('class').match("decrease-cart")){
            this.parentNode.querySelector('input').stepDown();
        }
        
    });
}

var product_thumb = document.querySelector(".product-thumb");
if(product_thumb){
    product_thumb.addEventListener('click', function(){
        //var siblings = this.siblings();
        //console.log(siblings);
    });
}
	
