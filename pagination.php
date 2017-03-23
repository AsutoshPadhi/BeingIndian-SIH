<<<<<<< HEAD
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<body>
<div class="w3-container">

<h2>Pagination</h2>

<div class="w3-bar">
  <a href="css.php" class="w3-button" id="i1" onclick="f()">1</a>
  <a href="css1.php" class="w3-button" id="i2" onclick="f()">2</a>
</div>
<script>
</script>
</div>
</body>
</html>
=======
function loadSearch(url){
	if (window.XMLHttpRequest)
    {
        // code for modern browsers
        xhttp = new XMLHttpRequest();
    }
    else
    {
        // code for IE6, IE5
        xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("problem").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}
>>>>>>> origin/isha
