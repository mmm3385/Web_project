<?php
$name=$_GET['username'];
$mail=$_GET['mail'];
$phone=$_GET['phone'];
$address=$_GET['address'];
$numOfMed=$_GET['numOfMed'];
$db = new PDO('mysql:host=localhost','root','root33');
$db->exec("use Orders_med");
$db->exec("insert into user_information values('$name','$mail','$phone','$address');");
for($i=0;$i<=$numOfMed;$i++)
{
	$med=$_GET['med'.$i];
	$type=$_GET['s'.$i];
	$quantity=$_GET['q'.$i];
	$db->exec("insert into medicines values('$med','$type','$quantity','$phone');");
	$a[$i][0]=$med;
	$a[$i][1]=$type;
	$a[$i][2]=$quantity;
}
?>
<html>
<head>
<style>
body{
	color:white;
}
p,a{
	margin:auto;
}
p{
	margin-top:100pt;
}
.t1{
	margin-top:70pt;
}
</style>
<link rel="stylesheet" href="w3.css" />
</head>
<body class="w3-green">
<div align="center">
<table class="t1 w3-table w3-card w3-teal w3-large w3-centered ">
<tr>
<th>Medicine</th><th>Type</th><th>Quantity</th>
</tr>
<?php
for($i=0;$i<=$numOfMed;$i++)
{
	echo "<tr><td>".$a[$i][0]."</td><td>".$a[$i][1]."</td><td>".$a[$i][2]."</td></tr>";
}
?>
</table>
<p class="w3-tag w3-xlarge w3-green w3-xlarge">Your order is saved</p> <br/><br/>
<a class="w3-button w3-blue w3-xlarge" href="clientinterface.php" >back</a>
</div>
</body>
</html>