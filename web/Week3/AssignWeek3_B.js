// JavaScript source code
function addToCart(itemid){
   
   var numberVal = parseInt(sessionStorage.getItem(itemid.id));
   numberVal++;
   sessionStorage.setItem(itemid.id, numberVal.toString());
}

function viewCart() {
   window.open("https://calm-shelf-84172.herokuapp.com/AssignWeek3_Cart.php", '_top');
}