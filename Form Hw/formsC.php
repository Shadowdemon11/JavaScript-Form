<?php
	
	
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["first-name"]))
		{
			$errors[] = "Please enter a first name.";
			
		}
		if(empty($_POST["last-name"]))
		{
			$errors[] = "Please enter a last name.";
		}
		$re = "/^\\D?(\\d{3})\\D?\\D?(\\d{3})\\D?(\\d{4})$/";
		if(empty($_POST["phone-number"]))
		{
			$errors[] = "Please enter a phone number.";
		}		
		else if (!preg_match($re , $_POST["phone-number"]))
		{
			$errors[] = "Please enter a phone number.";
		}
		if(empty($_POST["email"]))
		{
			$errors[] = "Please enter a email address.";
		}
		else if(!preg_match("/(\\w[-._\\w]*\\w@\\w[-._\\w]*\\w\\.\\w{2,3})/" , $_POST["email"]))
		{
			$errors[] = "Please enter a email address.";
		}
		if(empty($_POST["street-name"]))
		{
			$errors[] = "Please enter a street address.";
		}
		else if(!preg_match("/^\\d{1,6}\\040([A-Z]{1}[a-z]{1,}\\040[A-Z]{1}[a-z]{1,})$|^\\d{1,6}\\040([A-Z]{1}[a-z]{1,}\\040[A-Z]{1}[a-z]{1,}\\040[A-Z]{1}[a-z]{1,})$|^\\d{1,6}\\040([A-Z]{1}[a-z]{1,}\\040[A-Z]{1}[a-z]{1,}\\040[A-Z]{1}[a-z]{1,}\\040[A-Z]{1}[a-z]{1,})$/" , $_POST["street-name"]))
		{
			$errors[] = "Please enter a street address.";
		}
		if(empty($_POST["city"]))
		{
			$errors[] = "Please enter a city name.";
		}
		if($_POST["state"] == "")
		{
			$errors[] = "Please select a state.";
		}
		if(empty($_POST["zip-code"]))
		{
			$errors[] = "Please enter a zip code.";
		}
		else if ($_POST["zip-code"]<6)
		{
			$errors[] = "Please enter at least 5 numbers for your zip code.";
		}
		else if (!preg_match("/(^(?!0{5})(\\d{5})(?!-?0{4})(|-\\d{4})?$)/",$_POST["zip-code"]))
		{
			$errors[] = "Please enter numbers for your zip code.";
		}
		if(empty($_POST["gender"]))
		{
			$errors[] = "Please check a gender.";
		}
		if(empty($_POST["smoked"]))
		{
			$errors[] = "Please check if you smoked.";
		}
		
		if(count($errors) === 0)
		{
			//send an email
			$subject = "Form submission from: ". $_POST["first-name"];
			foreach($_POST as $name => $val)
			{
				$body .="$name: $_POST[$name]\n";
			}
			if(mail("mkh3721@rit.edu" ,$subject, $body, "Cc:".$_POST["email"]))
			{
				
			}
			else
			{
			
			}
			
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
	<title>FormC</title>
	<link rel="stylesheet" type="text/css" href="formCss.css">
	<script src="formsjs.js"></script>
</head>
<body>
<h1>Moving Form</h1>
<?php
	if(count($errors)>0)
	{
		echo "<div style='color:red;font-weight:bold;'>";
			foreach($errors as $error)
			{
				echo"$error<br/>";
			}
		echo"</div>";
	}
?>
<div class="error-msg" id="error-msg"></div>
<form id="move-form"
		method="post"
		action="formsC.php"
		onsubmit="return validate();">
		
		<span>First Name:</span>
		<input type="text" id="first-name" name="first-name" size="20" value="<?php if(isset($_POST['first-name'])) { echo htmlentities ($_POST['first-name']); }?>" maxlength="20" placeholder="Enter first name" />
		<br/>
		<span>Last Name:</span>
		<input type="text" id="last-name" name="last-name" value="<?php if(isset($_POST['last-name'])) { echo htmlentities ($_POST['last-name']); }?>" size="20" maxlength="20" placeholder="Enter last name"/>
		<br/>
		<span>Phone Number</span>
		<input type="text" id="phone-number" name="phone-number" size="13" maxlength="13" value="<?php if(isset($_POST['phone-number'])) { echo htmlentities ($_POST['phone-number']); }?>" placeholder="(###)###-####"/>
		<br/>
		<span>Email</span>
		<input type="text" id="email" name="email" size="20" maxlength="50" value="<?php if(isset($_POST['email'])) { echo htmlentities ($_POST['email']); }?>" placeholder=""/>
		<br/>
		<span>Street Name:</span>
		<input type="text" id="street-name" name="street-name" size="21" maxlength="21" value="<?php if(isset($_POST['street-name'])) { echo htmlentities ($_POST['street-name']); }?>" placeholder="Enter US street Address" />
		<br/>
		<span>City:</span>
		<input type="text" id="city" name="city" size="22" maxlength="22" value="<?php if(isset($_POST['city'])) { echo htmlentities ($_POST['city']); }?>" placeholder="Enter city name" />
		<br/>
		<span id="textS">State:</span>
		<select name="state" id="state" >
			<option value="">- Select a state -</option>
			<option value="AL" <?php if($_POST['state'] == "AL"){echo 'selected';} ?>>Alabama</option>
			<option value="AK" <?php if($_POST['state'] == "AK"){echo 'selected';} ?>>Alaska</option>
			<option value="AZ" <?php if($_POST['state'] == "AZ"){echo 'selected';} ?>>Arizona</option>
			<option value="AR" <?php if($_POST['state'] == "AR"){echo 'selected';} ?>>Arkansas</option>
			<option value="CA" <?php if($_POST['state'] == "CA"){echo 'selected';} ?>>California</option>
			<option value="CO" <?php if($_POST['state'] == "CO"){echo 'selected';} ?>>Colorado</option>
			<option value="CT" <?php if($_POST['state'] == "CT"){echo 'selected';} ?>>Connecticut</option>
			<option value="DE" <?php if($_POST['state'] == "DE"){echo 'selected';} ?>>Delaware</option>
			<option value="FL" <?php if($_POST['state'] == "FL"){echo 'selected';} ?>>Florida</option>
			<option value="GA" <?php if($_POST['state'] == "GA"){echo 'selected';} ?>>Georgia</option>
			<option value="HI" <?php if($_POST['state'] == "HI"){echo 'selected';} ?>>Hawaii</option>
			<option value="ID" <?php if($_POST['state'] == "ID"){echo 'selected';} ?>>Idaho</option>
			<option value="IL" <?php if($_POST['state'] == "IL"){echo 'selected';} ?>>Illinois</option>
			<option value="IN" <?php if($_POST['state'] == "IN"){echo 'selected';} ?>>Indiana</option>
			<option value="IA" <?php if($_POST['state'] == "IA"){echo 'selected';} ?>>Iowa</option>
			<option value="KS" <?php if($_POST['state'] == "KS"){echo 'selected';} ?>>Kansas</option>
			<option value="KY" <?php if($_POST['state'] == "KY"){echo 'selected';} ?>>Kentucky</option>
			<option value="LA" <?php if($_POST['state'] == "LA"){echo 'selected';} ?>>Louisiana</option>
			<option value="ME" <?php if($_POST['state'] == "ME"){echo 'selected';} ?>>Maine</option>
			<option value="MD" <?php if($_POST['state'] == "MD"){echo 'selected';} ?>>Maryland</option>
			<option value="MA" <?php if($_POST['state'] == "MA"){echo 'selected';} ?>>Massachusetts</option>
			<option value="MI" <?php if($_POST['state'] == "MI"){echo 'selected';} ?>>Michigan</option>
			<option value="MN" <?php if($_POST['state'] == "MN"){echo 'selected';} ?>>Minnesota</option>
			<option value="MS" <?php if($_POST['state'] == "MS"){echo 'selected';} ?>>Mississippi</option>
			<option value="MO" <?php if($_POST['state'] == "MO"){echo 'selected';} ?>>Missouri</option>
			<option value="MT" <?php if($_POST['state'] == "MT"){echo 'selected';} ?>>Montana</option>
			<option value="NE" <?php if($_POST['state'] == "NE"){echo 'selected';} ?>>Nebraska</option>
			<option value="NV" <?php if($_POST['state'] == "NV"){echo 'selected';} ?>>Nevada</option>
			<option value="NH" <?php if($_POST['state'] == "NH"){echo 'selected';} ?>>New Hampshire</option>
			<option value="NJ" <?php if($_POST['state'] == "NJ"){echo 'selected';} ?>>New Jersey</option>
			<option value="NM" <?php if($_POST['state'] == "NM"){echo 'selected';} ?>>New Mexico</option>
			<option value="NY" <?php if($_POST['state'] == "NY"){echo 'selected';} ?>>New York</option>
			<option value="NC" <?php if($_POST['state'] == "NC"){echo 'selected';} ?>>North Carolina</option>
			<option value="ND" <?php if($_POST['state'] == "ND"){echo 'selected';} ?>>North Dakota</option>
			<option value="OH" <?php if($_POST['state'] == "OH"){echo 'selected';} ?>>Ohio</option>
			<option value="OK" <?php if($_POST['state'] == "OK"){echo 'selected';} ?>>Oklahoma</option>
			<option value="OR" <?php if($_POST['state'] == "OR"){echo 'selected';} ?>>Oregon</option>
			<option value="PA" <?php if($_POST['state'] == "PA"){echo 'selected';} ?>>Pennsylvania</option>
			<option value="RI" <?php if($_POST['state'] == "RI"){echo 'selected';} ?>>Rhode Island</option>
			<option value="SC" <?php if($_POST['state'] == "SC"){echo 'selected';} ?>>South Carolina</option>
			<option value="SD" <?php if($_POST['state'] == "SD"){echo 'selected';} ?>>South Dakota</option>
			<option value="TN" <?php if($_POST['state'] == "TN"){echo 'selected';} ?>>Tennessee</option>
			<option value="TX" <?php if($_POST['state'] == "TX"){echo 'selected';} ?>>Texas</option>
			<option value="UT" <?php if($_POST['state'] == "UT"){echo 'selected';} ?>>Utah</option>
			<option value="VT" <?php if($_POST['state'] == "VT"){echo 'selected';} ?>>Vermont</option>
			<option value="WA" <?php if($_POST['state'] == "WA"){echo 'selected';} ?>>Washington</option>
			<option value="WV" <?php if($_POST['state'] == "WV"){echo 'selected';} ?>>West Virginia</option>
			<option value="WI" <?php if($_POST['state'] == "WI"){echo 'selected';} ?>>Wisconsin</option>
			<option value="WY" <?php if($_POST['state'] == "WY"){echo 'selected';} ?>>Wyoming</option>
		</select>
		<br/>
		<span>Zip code:</span>
		<input type="text" id="zip-code" name="zip-code" size="5" maxlength="5" value="<?php if(isset($_POST['zip-code'])) { echo htmlentities ($_POST['zip-code']); }?>" />
		<br/>
		<span id="textG">Gender:</span>
		<input type="radio" id="male" name="gender" value="M" <?php if(isset($_POST['gender']) && $_POST['gender'] == "M"){echo 'checked="checked"';} ?>/>
		<label for="male">Male</label>
		&emsp;
		<input type="radio" id="female" name="gender" value="F" <?php if(isset($_POST['gender']) && $_POST['gender'] == "F"){echo 'checked="checked"';} ?>/>
		<label for="female">Female</label>
		<br/>
		<span id="textSM">Have you ever smoked:</span>
		<input type="radio" id="yes" name="smoked" value="Y" <?php if(isset($_POST['smoked']) && $_POST['smoked'] == "Y"){echo 'checked="checked"';} ?>/>
		<label for="yes">Yes</label>
		&emsp;
		<input type="radio" id="no" name="smoked" value="N" <?php if(isset($_POST['smoked']) && $_POST['smoked'] == "N"){echo 'checked="checked"';} ?>/>
		<label for="no">No</label>
		<br/>
		<input type="button" onClick="clearForm(this.form)" value="Reset Form"/>
		&emsp;
		<input name="submit" type="submit" value="submit form"/>
</body>

</html>