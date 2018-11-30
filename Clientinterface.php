<!DOCTYPE HTML>
<html>
<head>
<title>Pharmacy</title>
<script>
numofmed=0;
function add()
{
	numofmed++;
	document.getElementById("hid").value=numofmed;
	var x=document.getElementById("meddiv");
	//console.log(x.innerHTML);
	x.innerHTML+="<br/><br/>"+"Medicine: <input type='text' class='w3-round-large' name=med"+numofmed+" />";
	 x.innerHTML+=" Type:"+
	 " <select class='w3-round-large' name=s"+numofmed+">"+
	 "<option value='drinkable'>Drinkable</option>"+
	 "<option value='tablets'>Tablets</option>"+
	 "<option value='injection'>Injection</option>"+
	 "</select>";
	 x.innerHTML+=" Quanity: <input type='text' class='w3-round-large' name=q"+numofmed+" />";+
	 "<br/>";	
}
</script>
<style>
.pr1{
	width:300pt;
	height:270pt;
}
body{
	color:white;
}
.d1{
	width:605pt;
}
.b1{
	margin-left:94%;
}
.d2{
	width:100%;
	height:60pt;
	margin-top:-103pt;
	position:fixed;
}
.d3{
	margin-top:9em;
}
</style>
<link rel="stylesheet" href="w3.css" />
</head>
<body class="w3-deep-orange">
<div class="d2 w3-black">
<h2 style="margin-top:10pt;">&nbsp Pharmacy</h2>
</div>
<div class="d3" align="center">
<form action="save.php" method="get">
<div class="d1 w3-card w3-teal w3-round-large" >
<div id="meddiv" >
<br/>
Medicine: <input type="text" class="w3-round-large" name="med0" Required />
Type:
 <select name="s0" class="w3-round-large">
<option value="drinkable">Drinkable</option>
<option value="tablets">Tablets</option>
<option value="injection">Injection</option>
</select>
Quanity: <input type="text" class="w3-round-large" name="q0" Required />
</div><br/>
<input type="button" class="b1 w3-button  w3-black w3-round-large" value="+" onclick="add()" title="Add another medicine"><br/>
</div>
<pre class=" pr1 w3-card w3-teal w3-round-xxlarge " width=30pt><br/>
<label>Your name: <input type="text" class='w3-round-large' name="username"  Required /><br/></label>
<label>Mail : 	   <input type="email" class='w3-round-large' name="mail"title="It's optional" /><br/></label>
<label>phone:     <input type="number" class='w3-round-large' name="phone" Required/><br/></label>
<label>Address:                        
           <textarea  cols="21" class='w3-round' rows="3" name="address" placeholder="Type your address" Required></textarea></label>
<input type="hidden" name="numOfMed" class='w3-round-large' value="0" id="hid">
<input type="submit" class="w3-button w3-red"  value="order"/><input type="reset" class="w3-button w3-black" value="reset"/>

</pre>
</form>
</div>
</body>
</html>
