// JavaScript source code

function viewCart() {
   window.open("https://calm-shelf-84172.herokuapp.com/AssignWeek3_Cart.php", '_top');
}

function buttonClick() {
   $(document).ready(function () {
      $("#pants").click(function () {
         $.ajax({
            url: 'http://calm-shelf-84172.herokuapp.com/Week3/AssignWeek3_B.php',
            type: "POST",
            data: {'pants':'test'},
            success: function (data) {
               alert(data);
            },
            error: function(){
               alert("ERROR!");

         }
         });
      });
   });
}