// JavaScript source code

function viewCart() {
   window.open("https://calm-shelf-84172.herokuapp.com/AssignWeek3_Cart.php", '_top');
}

function buttonClick() {
   /*$.ajax({
      url: 'http://calm-shelf-84172.herokuapp.com/Week3/AssignWeek3_B.php',
      type: "POST",
      data: { different: "test" },
      success: function (data) {
         alert(data.different);
      },
      error: function () {
         alert("ERROR!");

      }
   */
   document.getElementById('hidden').innerHTML = "ordered";
      
   $.ajax({url:'http://calm-shelf-84172.herokuapp.com/Week3/AssignWeek3_B.php',
      type:"post",
      data: $("#hidden").val(),
      success: function (data) {
         alert(data);
      }
   });
}