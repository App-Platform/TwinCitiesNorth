<?php

// posted data to local variables 
$Name = Trim(stripslashes($_POST['Name'])); 
$Phone = Trim(stripslashes($_POST['Phone'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$radiomini = Trim(stripslashes($_POST['radiomini']));
$Message = Trim(stripslashes($_POST['Message'])); 

// Validate E-Mail isn't not a Email
if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
	} 
	else {
	print "<meta http-equiv=\"refresh\" content=\"0;URL=http://app-platform.net/formerror.htm\">";
	exit;
}

// validate required fields have data
if(trim($Email) == '') {
	print "<meta http-equiv=\"refresh\" content=\"0;URL=http://app-platform.net/formerror.htm\">";
	exit;
}


$EmailTo = "info@app-platform.net";
$From = "info@app-platform.net";
$Subject = "Info Request";
$headers = "From: $From";


// prepare email body text
$Body = "";
$Body .= "I would like someone from App-Platform.net to contact me.";
$Body .= "\n";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $Phone;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "\n";
$Body .= "Preferred Means for Us to Contact You: ";
$Body .= $radiomini;
$Body .= "\n";
$Body .= "Message: ";
$Body .= "\n";
$Body .= $Message;

// send email 
$success = mail($EmailTo,$Subject,$Body,$headers);

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=http://app-platform.net/thanks.htm\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=http://app-platform.net/formerror.htm\">";
}
?>