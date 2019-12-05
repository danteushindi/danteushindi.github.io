<?php
$name = filter_input(INPUT_POST,'name');
$email = filter_input(INPUT_POST,'email');
$subject = filter_input(INPUT_POST,'subject');
$message = filter_input(INPUT_POST,'message');
if (!empty($name)){
if (!empty($email)){
if (!empty($subject)){
if (!empty($message)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ushindi";

//create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


if (mysqli_connect_error()){
	die('Connect Error ('.mysqli_connect_errno() .') '.mysqli_connect_error());
}
else{
$sql = "INSERT INTO contact(name, email, subject, message) values('$name', '$email', '$subject', '$message')";
if ($conn->query($sql)){
	echo "New record is inserted successfully";
}
else{
	echo "Error: ". $sql ."". $conn->error;
}
$conn->close();
}
}
}
}
}
    $to = "danielushindi16@gmail.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    $number = $_REQUEST['number'];
    $cmessage = $_REQUEST['message'];

    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "You have a message from your Bitmap Photography.";

    $logo = 'img/logo.png';
    $link = '#';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);

?>