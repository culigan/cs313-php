// JavaScript source code

function viewCart() {
   window.open("https://calm-shelf-84172.herokuapp.com/AssignWeek3_Cart.php", '_top');
}

$(document).ready(function () {
   $("#pantsbutton").click(function () {
      $.ajax({
         url: 'http://calm-shelf-84172.herokuapp.com/Week3/AssignWeek3_B.php',
         type: "post",
         data: "cart",
         success: function () {
            alert("Item has been added");
         }
      });
   });
});