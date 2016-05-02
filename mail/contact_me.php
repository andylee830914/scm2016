<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone'])   	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
/*$toURL = "https://script.google.com/macros/s/AKfycby3ZGloD253wnEQ3RzfnJ4RRYSwh13jKwztrDrGaigSVmKUmmn_/exec";
$ch = curl_init();
$options = array(
	CURLOPT_URL=>$toURL,
	CURLOPT_HEADER=>0,
	CURLOPT_VERBOSE=>0,
	CURLOPT_RETURNTRANSFER=>true,
	CURLOPT_USERAGENT=>"Mozilla/4.0 (compatible;)",
	CURLOPT_POST=>true,
	CURLOPT_POSTFIELDS=>http_build_query($_POST),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
curl_close($ch);
*/
$today=date_create('');
$fp = fopen('file.csv', 'a') or die("Unable to open file!");
$data=array("time"=>date_format($today, 'Y-m-d H:i:s'))+ $_POST;
fputcsv($fp, $data);
fclose($fp);
// Create the email and send the message
//$to = 'yourname@yourdomain.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
//$email_subject = "Website Contact Form:  $name";
//$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
//$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
//$headers .= "Reply-To: $email_address";
//mail($to,$email_subject,$email_body,$headers);
return true;
?>
