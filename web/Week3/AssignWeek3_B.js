// JavaScript source code

function viewCart() {
   window.open("https://calm-shelf-84172.herokuapp.com/AssignWeek3_Cart.php", '_top');
}

function buttonClick() {
   $.ajax({
      url: 'http://calm-shelf-84172.herokuapp.com/Week3/AssignWeek3_B.php',
      type: "POST",
      data: { pants: $("#pants").val() },
      success: function (data) {
         alert(data.pants);
      },
      error: function () {
         alert("ERROR!");

      }
   });
      
}