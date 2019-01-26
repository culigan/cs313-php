// JavaScript source code

function viewCart() {
   window.open("https://calm-shelf-84172.herokuapp.com/AssignWeek3_Cart.php", '_top');
}

function buttonClick() {
   $.ajax({
      url: 'http://calm-shelf-84172.herokuapp.com/Week3/AssignWeek3_B.php',
      success: function (data) {
         alert(data);
      },
      error: function () {
         alert("ERROR!");

      }
   });
}