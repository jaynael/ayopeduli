<?php
 
//Retrieve form data. 
//GET - user submitted data using AJAX
//POST - in case user does not support javascript, we'll use POST instead
//$name = ($_GET['name']) ? $_GET['name'] : $_POST['name'];
//$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];
//$website = ($_GET['website']) ?$_GET['website'] : $_POST['website'];
//$comment = ($_GET['comment']) ?$_GET['comment'] : $_POST['comment'];

$username = ($_GET['username ']) ? $_GET['username '] : $_POST['username '];
$password = ($_GET['password']) ?$_GET['password'] : $_POST['password'];
$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];
$firstname = ($_GET['firstname']) ?$_GET['firstname'] : $_POST['firstname'];
$age = ($_GET['age']) ?$_GET['age'] : $_POST['age'];
$gender = ($_GET['gender']) ?$_GET['gender'] : $_POST['gendere'];
$country = ($_GET['country']) ?$_GET['country'] : $_POST['country'];
//flag to indicate which method it uses. If POST set it to 1
if ($_POST) $post=1;
 
//Simple server side validation for POST data, of course, 
//you should validate the email
/*if (!$name) $errors[count($errors)] = 'Please enter your name.';
if (!$email) $errors[count($errors)] = 'Please enter your email.'; 
if (!$comment) $errors[count($errors)] = 'Please enter your comment.'; */
 
//if the errors array is empty, send the mail
if (!$errors) {
 
    //recipient - change this to your name and email
    $to = 'Jaenal gufron <jaynael@gmail.com>'; 
    //sender
    $from = $firstname . ' <' . $email . '>';
     
    //subject and the html message
    $subject = 'Dukungan baru untuk ' . $gender; 
    $message = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head></head>
    <body>
    <table>
        <tr><td>User Name</td><td>' . $username . '</td></tr>
        <tr><td>Email</td><td>' . $email . '</td></tr>
        <tr><td>Password</td><td>' . $password . '</td></tr>
		<tr><td>Firstname Name</td><td>' . $firstname . '</td></tr>
        <tr><td>Age</td><td>' . $age . '</td></tr>
        <tr><td>Gender</td><td>' . $gender . '</td></tr>
        <tr><td>Deskripsi</td><td>' . nl2br($country) . '</td></tr>
    </table>
    </body>
    </html>';
 
    //send the mail
    $result = sendmail($to, $subject, $message, $from);
     
    //if POST was used, display the message straight away
    if ($_POST) {
        if ($result) echo 'Thank you! We have received your message.';
        else echo 'Sorry, unexpected error. Please try again later';
         
    //else if GET was used, return the boolean value so that 
    //ajax script can react accordingly
    //1 means success, 0 means failed
    } else {
        echo $result;   
    }
 
//if the errors array has values
} else {
    //display the errors message
    for ($i=0; $i<count($errors); $i++) echo $errors[$i] . '<br/>';
    echo '<a href="form.php">Back</a>';
    exit;
}
 
 
//Simple mail function with HTML header
function sendmail($to, $subject, $message, $from) {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= 'From: ' . $from . "\r\n";
     
    $result = mail($to,$subject,$message,$headers);
     
    if ($result) return 1;
    else return 0;
}
?>