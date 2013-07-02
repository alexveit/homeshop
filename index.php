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
    width:100%-10px;
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
						<td style="border-style:solid; border-width:1px; padding:5px;"><i>Fill out your information and<br>the type of material you would<br>like us to bring.</i></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
<br>
<?php
$reload = false;
if(isset($_SESSION['reload']))
{
	$reload = true;
	echo "<b style='color: red;'>* Invalid Captcha</b><br>";		
}
?>
<form name="myForm" onsubmit="return validateForm()" action="next.php" method="post">
	<table border="0">
		<tr><td colspan="2">* = required</td></tr>
		<tr>
			<td>Date:*<br><input type="date" name="date" <?php if($reload){ echo "value='".$_POST['date']."'"; } ?> ></td>
			<td>
				Time:*<br>
				<select name="time" size="1">
					<option value="8am" <?php if($reload) echo ($_POST['time'] == "8am") ? 'selected="selected"': ''; ?> >8am</option>
					<option value="9am" <?php if($reload) echo ($_POST['time'] == "9am") ? 'selected="selected"': ''; ?> >9am</option>
					<option value="10am" <?php if($reload) echo ($_POST['time'] == "10am") ? 'selected="selected"': ''; ?> >10am</option>
					<option value="11am" <?php if($reload) echo ($_POST['time'] == "11am") ? 'selected="selected"': ''; ?> >11am</option>
					<option value="12pm" <?php if($reload) echo ($_POST['time'] == "12pm") ? 'selected="selected"': ''; ?> >12pm</option>
					<option value="1pm" <?php if($reload) echo ($_POST['time'] == "1pm") ? 'selected="selected"': ''; ?> >1pm</option>
					<option value="2pm" <?php if($reload) echo ($_POST['time'] == "2pm") ? 'selected="selected"': ''; ?> >2pm</option>
					<option value="3pm" <?php if($reload) echo ($_POST['time'] == "3pm") ? 'selected="selected"': ''; ?> >3pm</option>
					<option value="4pm" <?php if($reload) echo ($_POST['time'] == "4pm") ? 'selected="selected"': ''; ?> >4pm</option>
					<option value="5pm" <?php if($reload) echo ($_POST['time'] == "5pm") ? 'selected="selected"': ''; ?> >5pm</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>First Name:*<br><input type="text" name="firstname" <?php echo ($reload) ? "value='".$_POST['firstname']."'" : "value=''"; ?> /></td>
			<td>Last Name:*<br><input type="text" name="lastname" <?php echo ($reload) ? "value='".$_POST['lastname']."'" : "value=''"; ?> /></td>
		</tr>
		<tr>
			<td colspan="2">
				<table border="0" style="width:100%">
					<tr>
						<td style="width:75%">Street address:*<br><input type="text" name="streetaddress" <?php echo ($reload) ? "value='".$_POST['streetaddress']."'" : "value=''"; ?> /></td>
						<td>Apt#:<br><input type="text" name="aptnumber" <?php echo ($reload) ? "value='".$_POST['aptnumber']."'" : "value=''"; ?> /></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<table border="0" style="width:100%">
					<tr>
						<td style="width:65%">City:<br><input type="text" name="city" <?php echo ($reload) ? "value='".$_POST['city']."'" : "value=''"; ?> /></td>
						<td style="width:15px">State:<br><input type="text" name="state" <?php echo ($reload) ? "value='".$_POST['state']."'" : "value=''"; ?> /></td>
						<td>Zip:*<br><input type="text" name="zipcode" <?php echo ($reload) ? "value='".$_POST['zipcode']."'" : "value=''"; ?> /></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>Phone Number:*<br><input type="text" name="phonenumber" <?php echo ($reload) ? "value='".$_POST['phonenumber']."'" : "value=''"; ?> /></td>
			<td >Email:*<br><input type="text" name="email" <?php echo ($reload) ? "value='".$_POST['email']."'" : "value=''"; ?> /></td>
		</tr>
		<tr>
			<td colspan="2" style="border-style:solid; border-width:1px;">
				<ol class="tree">
					<li><br></li>
					<li><big>Material</big></li>
					<li><br></li>
					<li>
						<label for="Hardwood">Hardwood</label> <input class="oltree" type="checkbox" name="Hardwood" />
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
										<td><input type="checkbox" name="Solid" <?php if(isset($_POST['Solid'])) { echo "checked='true'"; } ?>  />Solid</td>
										<td><input type="checkbox" name="HardwoodOak" <?php if(isset($_POST['HardwoodOak'])) { echo "checked='true'"; } ?> />Oak</td>
										<td><input type="checkbox" name="HardwoodSmooth" <?php if(isset($_POST['HardwoodSmooth'])) { echo "checked='true'"; } ?> />Smooth</td>
										<td><input type="checkbox" name="Hardwoodtwoonequarter" <?php if(isset($_POST['Hardwoodtwoonequarter'])) { echo "checked='true'"; } ?> />2 1/4"</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="Engineered" <?php if(isset($_POST['Engineered'])) { echo "checked='true'"; } ?> />Engineered</td>
										<td><input type="checkbox" name="HardwoodMaple" <?php if(isset($_POST['HardwoodMaple'])) { echo "checked='true'"; } ?> />Maple</td>
										<td><input type="checkbox" name="HardwoodHandscraped" <?php if(isset($_POST['HardwoodHandscraped'])) { echo "checked='true'"; } ?> />Handscraped</td>
										<td><input type="checkbox" name="Hardwoodthreehalf" <?php if(isset($_POST['Hardwoodthreehalf'])) { echo "checked='true'"; } ?> />3 1/2"</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="Bamboo" <?php if(isset($_POST['Bamboo'])) { echo "checked='true'"; } ?> />Bamboo</td>
										<td><input type="checkbox" name="HardwoodHickory" <?php if(isset($_POST['HardwoodHickory'])) { echo "checked='true'"; } ?> />Hickory</td>
										<td></td>
										<td><input type="checkbox" name="Hardwoodfive" <?php if(isset($_POST['Hardwoodfive'])) { echo "checked='true'"; } ?> />5"</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="Cork" <?php if(isset($_POST['Cork'])) { echo "checked='true'"; } ?> />Cork</td>
										<td><input type="checkbox" name="HardwoodBirch" <?php if(isset($_POST['HardwoodBirch'])) { echo "checked='true'"; } ?> />Birch</td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td></td>
										<td><input type="checkbox" name="HardwoodExotic" <?php if(isset($_POST['HardwoodExotic'])) { echo "checked='true'"; } ?> />Exotic</td>
										<td></td>
										<td></td>
									</tr>
								</table>
							</li>
						</ol>
					</li>
					<li><br></li>
					<li>
						<label for="Laminate">Laminate</label> <input class="oltree" type="checkbox" name="Laminate" />
						<ol>
							<li>
								<table style="position:relative; left:-30px; width:280px; border-style:solid; border-width:1px;" >
									<tr>
										<td><b>Millimeter</b></td>
										<td><b>Finish</b></td>
										<td><b>Width</b></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="Laminate7" <?php if(isset($_POST['Laminate7'])) { echo "checked='true'"; } ?> />7</td>
										<td><input type="checkbox" name="LaminateHandscraped" <?php if(isset($_POST['LaminateHandscraped'])) { echo "checked='true'"; } ?> />Handscraped</td>
										<td><input type="checkbox" name="Laminate3inch" <?php if(isset($_POST['Laminate3inch'])) { echo "checked='true'"; } ?> />3"</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="Laminate8" <?php if(isset($_POST['Laminate8'])) { echo "checked='true'"; } ?> />8</td>
										<td><input type="checkbox" name="LaminateSmooth" <?php if(isset($_POST['LaminateSmooth'])) { echo "checked='true'"; } ?> />Smooth</td>
										<td><input type="checkbox" name="Laminate5inch" <?php if(isset($_POST['Laminate5inch'])) { echo "checked='true'"; } ?> />5"</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="Laminate12" <?php if(isset($_POST['Laminate12'])) { echo "checked='true'"; } ?> />12</td>
										<td><input type="checkbox" name="LaminatePiano" <?php if(isset($_POST['LaminatePiano'])) { echo "checked='true'"; } ?> />Piano</td>
										<td><input type="checkbox" name="Laminate6inch" <?php if(isset($_POST['Laminate6inch'])) { echo "checked='true'"; } ?> />6"</td>
									</tr>
								</table>
							</li>
						</ol>
					</li>
					<li><br></li>
					<li>
						<label for="Tile">Tile</label> <input class="oltree" type="checkbox" name="Tile" />
						<ol>
							<li>
								<table style="position:relative; left:-30px; width:100px; border-style:solid; border-width:1px;" >
									<tr>
										<td><b>Type</b></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="Ceramic" <?php if(isset($_POST['Ceramic'])) { echo "checked='true'"; } ?> />Ceramic</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="Porcelain" <?php if(isset($_POST['Porcelain'])) { echo "checked='true'"; } ?> />Porcelain</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="Stone" <?php if(isset($_POST['Stone'])) { echo "checked='true'"; } ?> />Stone</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="Glass" <?php if(isset($_POST['Glass'])) { echo "checked='true'"; } ?> />Glass</td>
									</tr>
								</table>
							</li>
						</ol>
					</li>
					<li><br></li>
					<li>
						<label for="Carpet">Carpet</label> <input class="oltree" type="checkbox" name="Carpet" />
						<ol>
							<li>
								<table style="position:relative; left:-30px; width:220px; border-style:solid; border-width:1px;" >
									<tr>
										<td><b>Style</b></td>
										<td><b>Color</b></td>
									</tr>
									<tr>
										<td><input type="checkbox" name="CarpetFrieze" <?php if(isset($_POST['CarpetFrieze'])) { echo "checked='true'"; } ?> />Frieze</td>
										<td><input type="checkbox" name="CarpetSolid" <?php if(isset($_POST['CarpetSolid'])) { echo "checked='true'"; } ?> />Solid</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="CarpetPlush" <?php if(isset($_POST['CarpetPlush'])) { echo "checked='true'"; } ?> />Plush</td>
										<td><input type="checkbox" name="CarpetMultiColor" <?php if(isset($_POST['CarpetMultiColor'])) { echo "checked='true'"; } ?> />Multi Color</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="CarpetBerber" <?php if(isset($_POST['CarpetBerber'])) { echo "checked='true'"; } ?> />Berber</td>
										<td><input type="checkbox" name="CarpetBarberPole" <?php if(isset($_POST['CarpetBarberPole'])) { echo "checked='true'"; } ?> />Barber Pole</td>
									</tr>
									<tr>
										<td><input type="checkbox" name="CarpetSaxony" <?php if(isset($_POST['CarpetSaxony'])) { echo "checked='true'"; } ?> />Saxony</td>
									</tr>
								</table>
							</li>
						</ol>
					</li>
				</ol>	
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<br>
				Additional notes:<br>
				<textarea name="notes" rows="5" cols="60" style=""><?php if($reload) { echo $_POST['notes']; } ?></textarea>
			</td>
		</tr>
	</table>
	<?php
	  require_once('recaptchalib.php');
	  $publickey = "6LcAbeMSAAAAACBMthYS-SWHeFkoNL683E4alo3P"; // you got this from the signup page
	  if($reload)
		echo "<b style='color: red;'>* Invalid Captcha</b><br>";
	  echo recaptcha_get_html($publickey);
	?>
	<input name="save" type="submit" value="Submit" />
	<input type="reset" value="Clear" />
</form>
</center>
</body>
</html>
