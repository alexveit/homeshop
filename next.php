<html>
<body>
<?php

function get_user_info()
{
	$temp = explode("T", $_POST['datetime']);
	$date = explode("-", $temp[0]);
	$datetime = "$date[1]/$date[2]/$date[0] @ $temp[1]";
	
	$user_info =  "
	<table style='border-style:solid; border-width:1px;'>
		<tr><td colspan='2' style='text-align:center'><h2>New Appointment</h2></td></tr>
		<tr>
			<td colspan='2'><b>Date & Time:</b> <i>$datetime</i></td>
		</tr>
		<tr>
			<td><b>First Name:</b> <i>".$_POST['firstname']."</i></td>
			<td><b>Last Name:</b> <i>".$_POST['lastname']."</i></td>
		</tr>
		<tr>
			<td colspan='2'>
				<table border='0' style='width:100%'>
					<tr>
						<td><b>Street address:</b> <i>".$_POST['streetaddress']."</i></td>
						<td><b>Apt#:</b> <i>".$_POST['aptnumber']."</i></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<table border='0' style='width:100%'>
					<tr>
						<td><b>City:</b> <i>".$_POST['city']."</i></td>
						<td><b>State:</b> <i>".$_POST['state']."</i></td>
						<td><b>Zip:</b> <i>".$_POST['zipcode']."</i></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
				<table border='0' style='width:100%'>
					<tr>
						<td><b>Phone Number:</b> <i>".$_POST['phonenumber']."</i></td>
						<td><b>Email:</b> <i>".$_POST['email']."</i></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	";
	
	return $user_info;
}

function get_hardwood_info()
{
	$info = "";
	
	$array = array("Solid","Engineered","Bamboo","Cork",
		"HardwoodOak","HardwoodMaple","HardwoodHickory",
		"HardwoodSmooth","HardwoodHandscraped",
		"Hardwoodtwoonequarter","Hardwoodthreehalf","Hardwoodfive");
	
	$good = false;
	
	for($i = 0; $i < 12; $i++)
	{
		if(isset($_POST[$array[$i]]))
		{
			$good = true;
			break;
		}
		
	}
	
	if($good)
	{
		$info = "<hr><ul>";
		
		$good = false;
		$info .= "<li>Hardwood</li>";
		$temp = "<ul><li>Type</li><ul>";
		for($i = 0; $i < 4; $i++)
		{
			if(isset($_POST[$array[$i]]))
			{
				$good = true;
				$temp .= "<li>".$array[$i]."</li>";
			}
			
		}
		$temp .= "</ul>";
		if($good)
			$info .= $temp;
		
		
		$temp = "<li>Species</li><ul>";
		$good = false;
		for($i = 4; $i < 7; $i++)
		{
			if(isset($_POST[$array[$i]]))
			{
				$good = true;
				switch($i)
				{
				case 4: $temp .= "<li>Oak</li>"; break;
				case 5: $temp .= "<li>Maple</li>"; break;
				case 6: $temp .= "<li>Hickory</li>"; break;
				}
			}
			
		}
		$temp .= "</ul>";
		if($good)
			$info .= $temp;
			
		$temp = "<li>Finish</li><ul>";
		$good = false;
		for($i = 7; $i < 9; $i++)
		{
			if(isset($_POST[$array[$i]]))
			{
				$good = true;
				switch($i)
				{
				case 7: $temp .= "<li>Smooth</li>"; break;
				case 8: $temp .= "<li>Handscraped</li>"; break;
				}
			}
			
		}
		$temp .= "</ul>";
		if($good)
			$info .= $temp;
		
		$temp = "<li>Width</li><ul>";
		$good = false;
		for($i = 9; $i < 12; $i++)
		{
			if(isset($_POST[$array[$i]]))
			{
				$good = true;
				switch($i)
				{
				case 9: $temp .= "<li>2' 1/4\"</li>"; break;
				case 10: $temp .= "<li>3' 1/2\"</li>"; break;
				case 11: $temp .= "<li>5'</li>"; break;
				}
			}
			
		}
		$temp .= "</ul>";
		$temp .= "</ul>";
		if($good)
			$info .= $temp;
	
		$info .= "</ul>";
	}
	
	return $info;
}

function get_laminate_info()
{
	$info = "";
	
	$array = array("Laminate7","Laminate8","Laminate12","LaminateHandscraped",
		"LaminateSmooth","LaminatePiano","Laminate3inch",
		"Laminate5inch","Laminate6inch");
	
	$good = false;
	
	for($i = 0; $i < 9; $i++)
	{
		if(isset($_POST[$array[$i]]))
		{
			$good = true;
			break;
		}
		
	}
	
	if($good)
	{
		$info = "<hr><ul>";
		
		$good = false;
		$info .= "<li>Laminate</li>";
		$temp = "<ul><li>Millimiter</li><ul>";
		for($i = 0; $i < 3; $i++)
		{
			if(isset($_POST[$array[$i]]))
			{
				$good = true;
				switch($i)
				{
				case 0: $temp .= "<li>7</li>"; break;
				case 1: $temp .= "<li>8</li>"; break;
				case 2: $temp .= "<li>12</li>"; break;
				}
			}
			
		}
		$temp .= "</ul>";
		if($good)
			$info .= $temp;
		
		
		$temp = "<li>Finish</li><ul>";
		$good = false;
		for($i = 3; $i < 6; $i++)
		{
			if(isset($_POST[$array[$i]]))
			{
				$good = true;
				switch($i)
				{
				case 3: $temp .= "<li>Handscraped</li>"; break;
				case 4: $temp .= "<li>Smooth</li>"; break;
				case 5: $temp .= "<li>Piano</li>"; break;
				}
			}
			
		}
		$temp .= "</ul>";
		if($good)
			$info .= $temp;
			
		$temp = "<li>Width</li><ul>";
		$good = false;
		for($i = 6; $i < 9; $i++)
		{
			if(isset($_POST[$array[$i]]))
			{
				$good = true;
				switch($i)
				{
				case 6: $temp .= "<li>3\"</li>"; break;
				case 7: $temp .= "<li>5\"</li>"; break;
				case 8: $temp .= "<li>6\"</li>"; break;
				}
			}
			
		}
		
		$temp .= "</ul>";
		if($good)
			$info .= $temp;
	
		$info .= "</ul></ul>";
		
	}
	
	
	
	return $info;
}

function get_tile_info()
{
	$info = "";
	
	$array = array("Ceramic","Porcelain","Stone","Glass");
	
	$good = false;
	
	for($i = 0; $i < 4; $i++)
	{
		if(isset($_POST[$array[$i]]))
		{
			$good = true;
			break;
		}
		
	}
	
	if($good)
	{
		$info = "<hr><ul>";
		
		$good = false;
		$info .= "<li>Tile</li>";
		$temp = "<ul><li>Type</li><ul>";
		for($i = 0; $i < 4; $i++)
		{
			if(isset($_POST[$array[$i]]))
			{
				$good = true;
				$temp .= "<li>".$array[$i]."</li>";
			}
			
		}
		$temp .= "</ul>";
		if($good)
			$info .= $temp;
		
		$info .= "</ul></ul>";
	}
	
	return $info;
}

function send_email($emailBody)
{
	
	$recipient = "alex.wveit@gmail.com";
	$subject = "New Measurement Request";

	// To send HTML mail, the Content-type header must be set
	$mailheader  = 'MIME-Version: 1.0' . "\r\n";
	$mailheader .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$mailheader .= "From: ".$_POST['email']."\r\n";
	
	mail($recipient, $subject, $emailBody, $mailheader) or die("Error!");
}

function display_thankyou()
{
	echo "Thank you ".$_POST['firstname']." ".$_POST['lastname']."!<br>Your appointment request has been sent.<br>A representative will be contacting you shortly."; 
}
	
$emailBody = get_user_info();

$emailBody .= get_hardwood_info();

$emailBody .= get_laminate_info();

$emailBody .= get_tile_info();

//echo $emailBody;

send_email($emailBody);

display_thankyou();

?>
</body>
</html>