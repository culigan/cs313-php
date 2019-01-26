// JavaScript source code

function viewCart() {
   window.open("https://calm-shelf-84172.herokuapp.com/AssignWeek3_Cart.php", '_top');
}

function buttonClick() {
   var request = new XMLHttpRequest();
   request.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
         var jsonObj = JSON.parse(request.response);

         
   };
   
      request.open("POST", "https://calm-shelf-84172.herokuapp.com/AssignWeek3_B.php", true);
   request.send();
}
}