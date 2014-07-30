<?php



$name = $_POST['name']; // contain name of person

$email = $_POST['email']; // Email address of sender 

$web = $_POST['web']; // Your website URL

$jml = $_POST['jml']; // Your website URL

$untuk = $_POST['untuk']; // Donasi untuk 

$link = $_POST['link']; // Donasi untuk

$hp =$_POST['hp'];// NOmer hp donatur

$body = $_POST['text']; // Your message 

$receiver = "jaynael@gmail.com" ; // hardcode your email address here - This is the email address that all your feedbacks will be sent to 

$subject = "Ayopeduli.com : donasi baru dari $name ";

if (!empty($name) & !empty($email) && !empty($body)) {

    $body = "Name:{$name}\n\nEmail: {$email}\n\nNo. Hp :{$hp}\n\nkisaran Donasi :{$web}\n\nJumlah :{$jml} \n\nUntuk :{$untuk} \nlink : {$link}\n\nComments:{$body}";

	//$send = mail($receiver, 'donasi baru di ayopeduli.com dari', $body, "from: {$email}");

	$send = mail($receiver, $subject, $body, "from: {$email}");

    if ($send) {

        echo 'true'; //if everything is ok,always return true , else ajax submission won't work

    }



}



?>