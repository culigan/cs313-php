function clickAlert() {
   alert("Clicked!");
}

function changeColor() {
   var textarray = document.getElementById("colortext").value;

   document.getElementById("FirstDiv").style.backgroundColor = textarray;
}

function changeColor() {
   var textarray = document.getElementById("colortext").value;

   document.getElementById("FirstDiv").style.backgroundColor = textarray;
   /*<script>
     $(document).ready(function () {
        $("#ColorBut").click(function () {
           $("#FirstDiv").css("background-color", $("#colortext").val());
        });
     });

   $(document).ready(function () {
      $("#VisBut").click(function () {
         $("#ThirdDiv").fadeOut("slow");
      });
   });
   </script>*/
}

function changeVis() {
   $(document).ready(function () {
      $("#VisBut").click(function () {
         $("#ThirdDiv").fadeOut("slow");
      });
   });
}