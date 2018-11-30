<?php
session_start();
function getRow($q)
{
	$db = new PDO('mysql:host=localhost','root','root33');
	$db->exec("use Orders_med");
	$s=$db->prepare($q);
	$s->execute();
	return $s->fetch();
	
}
function getRows($q)
{
	$db = new PDO('mysql:host=localhost','root','root33');
	$db->exec("use Orders_med");
	$s=$db->prepare($q);
	$s->execute();
	return $s->fetchall();
}
if(isset($_POST["submit"]))
{
	$username=$_POST["username"];
	$pass=$_POST["pass"];
	$q="select * from owners where user_name='$username';";
	$row=getRow($q);
	if($row &&$row[2]==$pass)
	{
		$_SESSION['Entered']=true;
		$enter=true;
	}
	else{
		echo "<script>alert('invalid username or password');</script>";
		$enter=false;
	}
}
else if(isset($_POST['delete']))
{
	$enter=true;
	$id=(int)$_POST["id"];
	$db = new PDO('mysql:host=localhost','root','root33');
	$db->exec("use Orders_med");
    $db->exec("delete from user_information where phone = $id");
   
}
if(isset($_SESSION['Entered'])&&$_SESSION['Entered']==true)
{
	$enter=true;
}
else
	$enter=false;

?>
<html>
<head><title>Pharmacist</title>
<style>
.d2{
	width:100%;
	height:60pt;
	margin-top:-70pt;
	position:fixed;
}
.d1{
	
	width:90%;
	margin:auto;
	margin-top:70pt;
}

.d5{
	width:300pt;
	height:200pt;
	margin:auto;
	margin-top:70pt;
	
}
.b1{
}
</style>
<link rel="stylesheet" href="w3.css"/>
</head>
<?php
if($enter)
{
?>
<body class="w3-orange">
<div class="d2 w3-black">
<h2 style="margin-top:10pt;">&nbsp Pharmacy</h2>
</div>
<div class="d1" >
<table border=1 class="w3-table-all " >
<tr class="w3-black">
<th>Client name</th>
<th>Mail</th>
<th>Phone</th>
<th>Address</th>
<th>Orders</th>
</tr>
<?php
$users=getRows("select *from user_information");
$numOfUsers=getRow("select count(*) from user_information");

for($i=0;$i<$numOfUsers[0];$i++)
{
$medicine=getRows("select * from medicines where phone= ".$users[$i][2]); //$users[i][2] is phone which is primary key
$numofmed=getRow("select count(*) from medicines where phone= ".$users[$i][2]);

echo"<tr>
<td>".$users[$i][0]."</td>
<td>".$users[$i][1]."</td>
<td>".$users[$i][2]."</td>
<td>".$users[$i][3]."</td>
<td>";
echo "<ul>";
for($j=0;$j<$numofmed[0];$j++){
echo "<li>Medicine: ".$medicine[$j][0]." &nbsp Type: ".$medicine[$j][1]." &nbsp Quantity: ".$medicine[$j][2]."</li> <br/>";

}
echo "</ul><form action='ownerinterface.php' method='post'>".
"<input type='submit' name='delete' value='x' class='b1 w3-button w3-red' />".
"<input type='hidden' name='id' value=".$users[$i][2]." /></form></td></tr>";
}


?>
<tr class="w3-black"><td></td><td></td><td></td><td></td><td></td></tr>
</table>
</div>
</body>
<?php
}
else{
?>
<body class="w3-orange">
<div class="d2 w3-black">
<h2 style="margin-top:10pt;">&nbsp Pharmacy</h2>
</div>

<form action="ownerinterface.php" method="post">
<div class=" d5 w3-card w3-teal w3-round-xxlarge " width="30pt" align="center"><br/>
<label>User name: <input type="text" class='w3-round-large' name="username"  Required /><br/></label><br/><br/>
<label>password : 	   <input type="password" class='w3-round-large' name="pass" Required /><br/></label><br/><br/>
<input type="submit" class="w3-button w3-red" name="submit"  value="Log in"/>
</div>
</form>
</body>
<?php
}
?>
</html>