function clearForm(orms) {
	document.getElementById("error-msg").innerHTML = "";
	document.getElementById("textG").style.textDecoration="";
	document.getElementById("textSM").style.textDecoration="";
	document.getElementById("textS").style.textDecoration="";
	var elements = orms.elements;
   
	orms.reset();

	for(i=0; i<elements.length; i++) {
     
	field_type = elements[i].type.toLowerCase();
 
	switch(field_type) {
 
    case "text":  
		elements[i].value = "";
		elements[i].style.background = "white";
		break;
       
    case "radio":
    case "checkbox":
        if (elements[i].checked) 
		{
			elements[i].checked = false;
		}
		break;

    case "select-one":
    case "select-multi":
		elements[i].selectedIndex = 0;
		break;

    default:
		break;
  }
    }
}

  function validate()
  {
  	var errorMsg = "";
  	if (document.getElementById("first-name").value == "")
  	{
  		errorMsg += "First Name<br/>";
		document.getElementById("first-name").style.background = "red";
  	}
	else
	{
		document.getElementById("first-name").style.background = "white";
	}
	
	if (document.getElementById("last-name").value == "")
  	{
  		errorMsg += "Last Name<br/>";
		document.getElementById("last-name").style.background = "red";
  	}
	else
	{
		document.getElementById("last-name").style.background = "white";
	}
	
	var regexObj =/^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/;
	var number = document.getElementById("phone-number").value;
	if (document.getElementById("phone-number").value == "")
  	{
  		errorMsg += "Phone Number<br/>";
		document.getElementById("phone-number").style.background = "red";
  	}
	else if (!regexObj.test(number))
  	{
  		errorMsg += "Phone Number is not in the right format ex (000)000-0000<br/>";
		document.getElementById("phone-number").style.background = "red";
  	}
	else
	{
		document.getElementById("phone-number").style.background = "white";
	}
	
	var regexObj2 =/(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,3})/;
	var email = document.getElementById("email").value;
	if (document.getElementById("email").value == "")
  	{
  		errorMsg += "Email<br/>";
		document.getElementById("email").style.background = "red";
  	}
	else if(!regexObj2.test(email))
	{
		errorMsg += "Email is not in the right format ex joe@aol.com <br/>";
		document.getElementById("email").style.background = "red";
	}
	else
	{
		document.getElementById("email").style.background = "white";
	}
	var regexS =/^\d{1,6}\040([A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,})$|^\d{1,6}\040([A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,})$|^\d{1,6}\040([A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,}\040[A-Z]{1}[a-z]{1,})$/; 
	var street = document.getElementById("street-name").value;
	if (document.getElementById("street-name").value == "")
  	{
  		errorMsg += "Street Address<br/>";
		document.getElementById("street-name").style.background = "red";
  	}
	else if(!regexS.test(street))
	{
		errorMsg += "Street Address not the right Format must be capitalized ex. 123 West Main St<br/>";
		document.getElementById("street-name").style.background = "red";
	}
	else
	{
		document.getElementById("street-name").style.background = "white";
	}
	
	if (document.getElementById("city").value == "")
  	{
  		errorMsg += "City<br/>";
		document.getElementById("city").style.background = "red";
  	}
	else
	{
		document.getElementById("city").style.background = "white";
	}
	
	var state=document.forms[0].state;
	if(state.options[state.selectedIndex].value == "")
	{
		errorMsg += "State<br/>";
		document.getElementById("textS").style.textDecoration="underline";
	}
	else
	{
		document.getElementById("textS").style.textDecoration="";
	}
	
	if (document.getElementById("zip-code").value == "")
  	{
  		errorMsg += "Zip Code<br/>";
		document.getElementById("zip-code").style.background = "red";
  	}
	else if(document.getElementById("zip-code").value.length < 5)
	{
		errorMsg += "Zip Code must have 5 numbers<br/>";
		document.getElementById("zip-code").style.background = "red";
	}
	else if (isNaN(document.getElementById("zip-code").value))
  	{
  		errorMsg += "Zip Code must have all numbers<br/>";
		document.getElementById("zip-code").style.background = "red";
  	}
	else
	{
		document.getElementById("zip-code").style.background = "white";
	}
	
  	
	  	console.log(document.forms[0].elements[2].checked);
	 	console.log(document.forms[0].elements[2].value);
	 	if(!document.getElementsByName("gender")[0].checked && !document.getElementsByName("gender")[1].checked)
	 	{
	 		errorMsg += "Gender<br/>";
			document.getElementById("textG").style.textDecoration="underline";
	 	}
		else
		{
			document.getElementById("textG").style.textDecoration="";
		}
		if(!document.getElementsByName("smoked")[0].checked && !document.getElementsByName("smoked")[1].checked)
	 	{
	 		errorMsg += "Smoked<br/>";
			document.getElementById("textSM").style.textDecoration="underline";
	 	}
		else
		{
			document.getElementById("textSM").style.textDecoration="";
		}
		
  	if(errorMsg)
  	{
  		errorMsg = "Please  complete/fix the following fields: <br/>" + errorMsg;
  		document.getElementById("error-msg").innerHTML = errorMsg;
  		return false;
  	}
  	else
  	{
  		return true;
  	}
  }