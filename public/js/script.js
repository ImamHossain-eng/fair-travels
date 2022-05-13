function showService(){
    const servicesD = document.getElementById('serviceID');
    // servicesD.style.display="block";
    if (servicesD.style.display === "none") {
        servicesD.style.display = "block";
      } else {
        servicesD.style.display = "none";
      }
}
function showDesc(){
  const x = document.getElementById('myDescription');
  x.style.display = "block";  
}

function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }