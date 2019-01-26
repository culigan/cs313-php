// JavaScript source code
function addToCart(){
   
   $.ajax({
      url: 'http://calm-shelf-84172.herokuapp.com/Week3/AssignWeek3_B.php',
      method: "post",
      data: cart,
      success: function () {
         alert("Item has been added");
      }
   });
}

function viewCart() {
   window.open("https://calm-shelf-84172.herokuapp.com/AssignWeek3_Cart.php", '_top');
}