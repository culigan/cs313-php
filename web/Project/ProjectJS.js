function addItem() {
   var ingredDiv = document.getElementById("ingred");
   var amountSelect = document.createElement("select");
   var measType = document.createElement("select");
   var ingredient = document.createElement("input");
   var breakLine = document.createElement("br");
   var count = parseInt(document.getElementById('formid').length) - 4;
   var lastingred = document.getElementById('formid')[count];
   lastingred = lastingred.id;
   var t = lastingred.indexOf("t");
   count = parseInt(lastingred.slice(t + 1, lastingred.length));
   /*var measureLab = document.createElement("label");
   var ingredLab = document.createElement("label");


   amountLab.innerHTML = "Amount";
   measureLab.innerHTML = "Measurement Type";
   ingredLab.innerHTML = "Ingredients";*/
   count++;
   var lineBreak = document.createElement("div");
   ingredient.setAttribute("type", "text");
   ingredient.setAttribute("id", "ingredient" + count);
   ingredient.setAttribute("required", "");
   var tempString = "return" + count;
   lineBreak.setAttribute("id", tempString);

   amountSelect.setAttribute("id", "amount" + count)
   measType.setAttribute("id", "meastype" + count)
   ingredDiv.appendChild(amountSelect);
   //ingredDiv.appendChild(amountLab);
   ingredDiv.appendChild(measType);
   //ingredDiv.appendChild(measureLab);
   ingredDiv.appendChild(ingredient);
   //ingredDiv.appendChild(ingredLab);
   ingredDiv.appendChild(lineBreak);
   
   var a = document.getElementById("amount" + (count - 1));
   for (var i = 0; i < a.length; i++) {
      document.getElementById("amount" + count).innerHTML += "<option> " + a[i].textContent + "</option>";
      /*var addOpt = new Option();
      addOpt = document.createElement("option")
      addOpt.value = addOpt.textContent = a[i].textContent;

      amountSelect.appendChild(addOpt);*/
   }
   var b = document.getElementById("meastype" + (count - 1));
   for (var i = 0; i < b.length; i++) {
      document.getElementById("meastype" + count).innerHTML += "<option> " + b[i].textContent + "</option>";

      /*var addOptM = new Option();
      addOptM = document.createElement("option")
      addOptM.value = addOptM.textContent = b[i].textContent;

      measType.appendChild(addOptM);*/
   }
   
   
   document.getElementById(tempString).innerHTML = "<br/>";

}


function buttonClick(clothing) {
   $.ajax({
      url: 'http://calm-shelf-84172.herokuapp.com/Week3/Project_2.php',
      type: "POST",
      data: { item: clothing },
      success: function (data) {
         alert("Item has been added to the cart!");
      },
      error: function () {
         alert("ERROR!");

      }
   });
}