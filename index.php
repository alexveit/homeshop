<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="_styles.css" media="screen">
<style type="text/css">
input[type="text"] {
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}
textarea
{
    border:1px  #999999;
    width:100%;
    margin:5px 0;
    padding:3px;
}
</style>
<script>
function isWhitespaceNotEmpty(text)
{
	return text==null || text=="" || text.length > 0 && !/[^\s]/.test(text);
}

function good_email_address(x)
{
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
		return false;
	}
	return true;
}

function validateForm()
{
	var defText = " must be filled out";
	var field = document.forms["myForm"]["date"];
	var value = field.value;
	if (isWhitespaceNotEmpty(value))
	{
		alert("Date" + defText);
		field.focus();
		return false;
	}
	else
	{
		var date = value.split("-");
		var today = new Date();
		
		if(parseInt(date[0]) < today.getFullYear())
		{
			alert("Invalid Year " + date[0]);
			field.focus();
			return false;
		}
		
		if(parseInt(date[1]) < today.getMonth() + 1)
		{
			alert("Invalid Month " + date[1]);
			field.focus();
			return false;
		}
		
		if(parseInt(date[2]) < today.getDate())
		{
			alert("Invalid Day " + date[2]);
			field.focus();
			return false;
		}	
	}

	field = document.forms["myForm"]["firstname"];
	value = field.value;
	if (isWhitespaceNotEmpty(value))
	{
		alert("First Name" + defText);
		field.focus();
		return false;
	}
	
	field = document.forms["myForm"]["lastname"];
	value = field.value;
	if (isWhitespaceNotEmpty(value))
	{
		alert("Last Name" + defText);
		field.focus();
		return false;
	}
	
	field = document.forms["myForm"]["streetaddress"];
	value = field.value;
	if (isWhitespaceNotEmpty(value))
	{
		alert("Street Address" + defText);
		field.focus();
		return false;
	}
	
	field = document.forms["myForm"]["zipcode"];
	value = field.value;
	if (isWhitespaceNotEmpty(value))
	{
		alert("Zip" + defText);
		field.focus();
		return false;
	}
	
	field = document.forms["myForm"]["phonenumber"];
	value = field.value;
	if (isWhitespaceNotEmpty(value))
	{
		alert("Phone Number" + defText);
		field.focus();
		return false;
	}
	
	field = document.forms["myForm"]["email"];
	value = field.value;
	if (isWhitespaceNotEmpty(value))
	{
		alert("Email" + defText);
		field.focus();
		return false;
	}
	
	if (!good_email_address(value))
	{
		alert("Invalid Email");
		field.focus();
		return false;
	}
		
	return true;
}

</script>
</head>
<body>
<center>
<h1>Set Appointment</h1>
<div>
	<table border="0">
		<tr>
			<td><img src="speedingtruck.gif"></td>
			<td>
				<table>
					<tr>
						<td style="border-style:solid; border-width:1px;"><i>Fill out your information and<br>the type of material you would<br>like us to bring.</i></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
<br>
<form name="myForm" onsubmit="return validateForm()" action="next.php" method="post">
	<table border="1">
		<tr><td colspan="2">* = required</td></tr>
		<tr>
			<td>Date:*<br><input type="date" name="date"></td>
			<td>
				Time:*<br>
				<select name="time" size="1">
					<option value="8am">8am</option>
					<option value="9am">9am</option>
					<option value="10am">10am</option>
					<option value="11am">11am</option>
					<option value="12pm">12pm</option>
					<option value="1pm">1pm</option>
					<option value="2pm">2pm</option>
					<option value="3pm">3pm</option>
					<option value="4pm">4pm</option>
					<option value="5pm">5pm</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>First Name:*<br><input type="text" name="firstname" value="" /></td>
			<td>Last Name:*<br><input type="text" name="lastname" value="" /></td>
		</tr>
		<tr>
			<td colspan="2">
				<table border="0" style="width:100%">
					<tr>
						<td style="width:75%">Street address:*<br><input type="text" name="streetaddress" value="" /></td>
						<td>Apt#:<br><input type="text" name="aptnumber" value="" /></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<table border="0" style="width:100%">
					<tr>
						<td style="width:65%">City:<br><input type="text" name="city" value="" /></td>
						<td style="width:15px">State:<br><input type="text" name="state" value="" /></td>
						<td>Zip:*<br><input type="text" name="zipcode" value="" /></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>Phone Number:*<br><input type="text" name="phonenumber" value="" /></td>
			<td >Email:*<br><input type="text" name="email" value="" /></td>
		</tr>
		<tr>
			<td colspan="2">
				<ol class="tree">
					<li>I Want to see the following samples.</li>
					<li><br></li>
					<li>
						<label for="Hardwood">Hardwood</label> <input class="oltree" type="checkbox" id="Hardwood" name="Hardwood" />
						<ol>
							<li>
								<table style="position:relative; left:-30px; width:400px; border-style:solid; border-width:1px;" >
									<tr>
										<td><b>Type</b></td>
										<td><b>Species</b></td>
										<td><b>Finish</b></td>
										<td><b>Width</b></td>
									</tr>
									<tr>
										<td><input type="checkbox" id="Solid" name="Solid" />Solid</td>
										<td><input type="checkbox" id="HardwoodOak" name="HardwoodOak"/>Oak</td>
										<td><input type="checkbox" id="HardwoodSmooth" name="HardwoodSmooth" />Smooth</td>
										<td><input type="checkbox" id="Hardwoodtwoonequarter" name="Hardwoodtwoonequarter" />2 1/4"</td>
									</tr>
									<tr>
										<td><input type="checkbox" id="Engineered" name="Engineered" />Engineered</td>
										<td><input type="checkbox" id="HardwoodMaple" name="HardwoodMaple"/>Maple</td>
										<td><input type="checkbox" id="HardwoodHandscraped" name="HardwoodHandscraped" />Handscraped</td>
										<td><input type="checkbox" id="Hardwoodthreehalf" name="Hardwoodthreehalf" />3 1/2"</td>
									</tr>
									<tr>
										<td><input type="checkbox" id="Bamboo" name="Bamboo" />Bamboo</td>
										<td><input type="checkbox" id="HardwoodHickory" name="HardwoodHickory"/>Hickory</td>
										<td></td>
										<td><input type="checkbox" id="Hardwoodfive" name="Hardwoodfive" />5"</td>
									</tr>
									<tr>
										<td><input type="checkbox" id="Cork" name="Cork" />Cork</td>
										<td><input type="checkbox" id="HardwoodBirch" name="HardwoodBirch"/>Birch</td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td><input type="checkbox" id="HardwoodExotic" name="HardwoodExotic"/>Exotic</td>
										<td></td>
										<td></td>
									</tr>
								</table>
							</li>
						</ol>
					</li>
					<li><br></li>
					<li>
						<label for="Laminate">Laminate</label> <input class="oltree" type="checkbox" id="Laminate" name="Laminate" />
						<ol>
							<li>
								<table style="position:relative; left:-30px; width:280px; border-style:solid; border-width:1px;" >
									<tr>
										<td><b>Millimeter</b></td>
										<td><b>Finish</b></td>
										<td><b>Width</b></td>
									</tr>
									<tr>
										<td><input type="checkbox" id="Laminate7" name="Laminate7" />7</td>
										<td><input type="checkbox" id="LaminateHandscraped" name="LaminateHandscraped"/>Handscraped</td>
										<td><input type="checkbox" id="Laminate3inch" name="Laminate3inch"/>3"</td>
									</tr>
									<tr>
										<td><input type="checkbox" id="Laminate8" name="Laminate8" />8</td>
										<td><input type="checkbox" id="LaminateSmooth" name="LaminateSmooth"/>Smooth</td>
										<td><input type="checkbox" id="Laminate5inch" name="Laminate5inch"/>5"</td>
									</tr>
									<tr>
										<td><input type="checkbox" id="Laminate12" name="Laminate12" />12</td>
										<td><input type="checkbox" id="LaminatePiano" name="LaminatePiano"/>Piano</td>
										<td><input type="checkbox" id="Laminate6inch" name="Laminate6inch"/>6"</td>
									</tr>
								</table>
							</li>
						</ol>
					</li>
					<li><br></li>
					<li>
						<label for="Tile">Tile</label> <input class="oltree" type="checkbox" id="Tile" name="Tile" />
						<ol>
							<li>
								<table style="position:relative; left:-30px; width:100px; border-style:solid; border-width:1px;" >
									<tr>
										<td><b>Type</b></td>
									</tr>
									<tr>
										<td><input type="checkbox" id="Ceramic" name="Ceramic" />Ceramic</td>
									</tr>
									<tr>
										<td><input type="checkbox" id="Porcelain" name="Porcelain" />Porcelain</td>
									</tr>
									<tr>
										<td><input type="checkbox" id="Stone" name="Stone" />Stone</td>
									</tr>
									<tr>
										<td><input type="checkbox" id="Glass" name="Glass" />Glass</td>
									</tr>
								</table>
							</li>
						</ol>
					</li>
					<li><br></li>
					<li>
						<label for="Carpet">Carpet</label> <input class="oltree" type="checkbox" id="Carpet" name="Carpet" />
						<ol>
							<li>
								<table style="position:relative; left:-30px; width:220px; border-style:solid; border-width:1px;" >
									<tr>
										<td><b>Style</b></td>
										<td><b>Color</b></td>
									</tr>
									<tr>
										<td><input type="checkbox" id="CarpetFrieze" name="CarpetFrieze" />Frieze</td>
										<td><input type="checkbox" id="CarpetSolid" name="CarpetSolid" />Solid</td>
									</tr>
									<tr>
										<td><input type="checkbox" id="CarpetPlush" name="CarpetPlush" />Plush</td>
										<td><input type="checkbox" id="CarpetMultiColor" name="CarpetMultiColor" />Multi Color</td>
									</tr>
									<tr>
										<td><input type="checkbox" id="CarpetBerber" name="CarpetBerber" />Berber</td>
										<td><input type="checkbox" id="CarpetBarberPole" name="CarpetBarberPole" />Barber Pole</td>
									</tr>
									<tr>
										<td><input type="checkbox" id="CarpetSaxony" name="CarpetSaxony" />Saxony</td>
									</tr>
								</table>
							</li>
						</ol>
					</li>
				</ol>	
			</td>
		</tr>
	</table>
	<input name="save" type="submit" value="Submit" />
	<input type="reset" value="Clear" />
</form>
</center>
</body>
</html>
