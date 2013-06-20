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

function validateForm()
{
	var defText = " must be filled out";
	var field = document.forms["myForm"]["datetime"];
	var value = field.value;
	if (isWhitespaceNotEmpty(value))
	{
		alert("Date & Time" + defText);
		field.focus();
		return false;
	}
	else
	{
		var temp = value.split("T");
		var date = temp[0].split("-");
		var time = temp[1].split(":");
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
		else if(parseInt(date[2]) == today.getDate())
		{
			if(parseInt(time[0]) < today.getHours())
			{
				alert("Invalid Time");
				field.focus();
				return false;
			}
			else if(parseInt(time[0]) == today.getHours())
			{
				if(parseInt(time[1]) < today.getMinutes())
				{
					alert("Invalid Time");
					field.focus();
					return false;
				}
			}
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
	return true;
}

</script>

</head>
<body>
<center>
<form name="myForm" onsubmit="return validateForm()" action="next.php" method="post">
	<table border="0">
		<tr><td colspan="2" style="text-align:center"><h2>Set Appointment</h2></td></tr>
		<tr><td colspan="2">* = required</td></tr>
		<tr>
			<td colspan="2">Date & Time:* <input type="datetime-local" name="datetime"></td>
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
										<td></td>
										<td></td>
										<td></td>
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


<!--

<td></td>
<td></td>
<td></td>
<td></td>
		
-->



</center>
</body>
</html>
