<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AJAX</title>
</head>
<body>
<div id="info"></div>
<script type="text/javascript">
function changeContent() {
	var xhttp = new XMLHttpRequest();
 	xhttp.open("GET", "Hello.txt", true);
 	xhttp.send();

 	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("info").innerHTML = this.responseText;
		}
	}
	setTimeout(changeContent, 1000);
}
changeContent();
</script>
</body>
</html>