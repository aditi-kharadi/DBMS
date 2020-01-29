
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("lg");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


function c(){
 // alert("Entered");  
	var table = document.getElementById("table");
	var today = new Date();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
//	var r = x.rowIndex;
	table.rows[2].cells[4].innerHTML = time;
}


 
function submit() {
   var name= document.getElementById("name").value;
   var room= document.getElementById("room").value;
   var whr= document.getElementById("whr").value;
   if (name.length == 0){
   	alert("name can't be enpty");  	
         return false; 
   }
    if (room.length == 0){
   	alert("room no. can't be enpty");  	
         return false; 
   }
    if (whr.length == 0){
   	alert("place can't be enpty");  	
         return false; 
   }
   var today = new Date();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
   
   var table = document.getElementById("table");
  var row = table.insertRow(1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
   var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
	cell1.innerHTML = name;
  cell2.innerHTML = room;
  cell3.innerHTML = time;
  cell4.innerHTML = whr;
  cell5.innerHTML = "Check In";
  cell5.setAttribute("onclick", "c();");
  document.getElementById("form").reset();
}
/*var table = document.getElementById("table");
table.rows[2].cells[4].onclick = function () {
   var row = table.insertRow(i);
  var cell = row.insertCell(4);
  cell.innerHTML = "Hiii";
};*/


