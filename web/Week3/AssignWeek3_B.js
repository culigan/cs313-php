// JavaScript source code
function addToCart(itemid){
   
   /*var numberVal = parseInt(sessionStorage.getItem(itemid.id));
   numberVal++;
   sessionStorage.setItem(itemid.id, numberVal.toString());*/
   var phpString = "<?php echo $_SESSION['pants'] ?><br/>";
   document.getElementById("amountpants").innerHTML = phpString;
}

function viewCart() {
   window.open("https://calm-shelf-84172.herokuapp.com/AssignWeek3_Cart.php", '_top');
}