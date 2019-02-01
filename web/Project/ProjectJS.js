function addItem() {
   var ingredDiv = document.getElementById("ingred");
   var amountSelect = document.createElement("select");
   var measType = document.createElement("select");
   var ingredient = document.createElement("input");
   var breakLine = document.createElement("br");
   var addOpt = document.createElement("option")
   addOpt.value = addOpt.textContent = "1/2";
   var addOptM = document.createElement("option")
   addOptM.value = addOptM.textContent = "Cup";
   var count = document.getElementById("formid").length - 3;
   var amountLab = document.createElement("label");
   amountLab.innerHTML = "Amount";
   var measureLab = document.createElement("label");
   measureLab.innerHTML = "Measurement Type";
   var ingredLab = document.createElement("label");
   ingredLab.innerHTML = "Ingredients";

   amountSelect.appendChild(addOpt);

   measType.appendChild(addOptM);

   ingredient.setAttribute("type", "text");
   ingredient.setAttribute("name", "ingredient" + count);

   ingredDiv.appendChild(amountSelect);
   ingredDiv.appendChild(amountLab);
   ingredDiv.appendChild(measType);
   ingredDiv.appendChild(measureLab);
   ingredDiv.appendChild(ingredient);
   ingredDiv.appendChild(ingredLab);
   document.getElementById("ingred").innerHTML += "<br>";
   document.getElementById("ingred").innerHTML += "<br>";
   //ingredDiv.appendChild(breakLine);
   //ingredDiv.appendChild(breakLine);
}