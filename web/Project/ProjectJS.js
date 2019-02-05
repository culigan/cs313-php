function addItem() {
   var ingredDiv = document.getElementById("ingred");
   var amountSelect = document.createElement("select");
   var measType = document.createElement("select");
   var ingredient = document.createElement("input");
   var breakLine = document.createElement("br");
   var addOpt = document.createElement("option")
   var addOptM = document.createElement("option")
   var count = (document.getElementById("formid").length - 3) / 3;
   var amountLab = document.createElement("label");
   var measureLab = document.createElement("label");
   var ingredLab = document.createElement("label");
   var lineBreak = document.createElement("div");


   addOpt.value = addOpt.textContent = "1/2";
   addOptM.value = addOptM.textContent = "Cup";
   amountLab.innerHTML = "Amount";
   measureLab.innerHTML = "Measurement Type";
   ingredLab.innerHTML = "Ingredients";

   amountSelect.appendChild(addOpt);
   measType.appendChild(addOptM);

   ingredient.setAttribute("type", "text");
   ingredient.setAttribute("name", "ingredient" + count);
   var tempString = "return" + count;
   lineBreak.setAttribute("id", tempString);

   ingredDiv.appendChild(amountSelect);
   ingredDiv.appendChild(amountLab);
   ingredDiv.appendChild(measType);
   ingredDiv.appendChild(measureLab);
   ingredDiv.appendChild(ingredient);
   ingredDiv.appendChild(ingredLab);
   ingredDiv.appendChild(lineBreak);
   document.getElementById(tempString).innerHTML = "<br/>";

}

function populateSelect() {
   const Client = require('pg');

   const client = new Client({
      connectionString: process.env.DATABASE_URL,
      ssl: true,
   });

   client.connect();

   client.query('SELECT * From MeasurementType;', (err, res) => {
      if(err) throw err;
      for(let row of res.rows){
         console.log(JSON.stringify(row))
      }
      client.end();
   })
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